<?php

namespace App\Http\Controllers;

use App\Models\Fundraiser;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fundraiser = null;
        if(Input::has('fundraiser_id')){
            $fundraiser = Fundraiser::find(Input::get('fundraiser_id'));
        }
        else {
            return back()
                ->with('message', 'A fundraiser must be selected to view reviews')
                ->with('message_status', 'danger');
        }
        return view('review.index', compact(['fundraiser']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fundraiser = null;
        if(Input::has('fundraiser_id')){
            $fundraiser = Fundraiser::find(Input::get('fundraiser_id'));
        }
        else {
            return back()
                ->with('message', 'A fundraiser must be selected to write a review')
                ->with('message_status', 'danger');
        }
       return view('review.create', compact(['fundraiser']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $this->validate($request, [
                'user_id' => 'required|exists:users,id',
                'fundraiser_id' => 'required|exists:fundraisers,id',
                'comments' => 'required',
                'stars' => 'required|between:1,5',
            ]);
            $user = Auth::user();
        }
        else {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'fundraiser_id' => 'required|exists:fundraisers,id',
                'comments' => 'required',
                'stars' => 'required|between:1,5',
            ]);
            $user = User::byEmail(Input::get('email'));
            if(!$user){
                $user = User::create([
                    'name' => Input::get('name'),
                    'email' => Input::get['email'],
                    'password' => bcrypt(str_random(10)),
                ]);
            }
            
        }

        
        $existing_review = Review::byUserAndFundraiser($user->id,Input::get('fundraiser_id'));
        
        if($existing_review){
            return back()
                ->with('message', 'You have already created a review for this fundraiser.')
                ->with('message_status', 'danger')
                ->withInput();
        }


        $review = Review::create([
            'user_id'=>$user->id,
            'fundraiser_id'=>Input::get('fundraiser_id'),
            'stars'=>Input::get('stars'),
            'comments'=>Input::get('comments')
        ]);

        if(Auth::check()){
            return redirect(action('ReviewController@show', $review ))
                ->with('message', 'Your review has been saved')
                ->with('message_status', 'success');
        }
        else{
            return redirect(route('home' ))
                ->with('message', 'Your review has been saved')
                ->with('message_status', 'success');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('review.show', compact(['review']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
