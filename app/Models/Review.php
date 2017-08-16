<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fundraiser_id', 'user_id', 'comments', 'stars'
    ];

    public function fundraiser(){
        return $this->belongsTo('App\Models\Fundraiser');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public static function byUserAndFundraiser($user_id, $fundraiser_id){
        return self::where('user_id', $user_id)->where('fundraiser_id', $fundraiser_id)->first();
    }
}
