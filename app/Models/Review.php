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
        return $this->belongsTo('Models\Fundraiser');
    }

    public function user(){
        return $this->belongsTo('Models\User');
    }
}
