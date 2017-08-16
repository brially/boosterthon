<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fundraiser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


    /**
     * Reviews that users have created about the fundraiser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }
}
