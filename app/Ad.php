<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'duration', 'status', 'price', 'user_id'
    ];

	public function User()
	{
		return $this->belongsTo('App\User');
	}

	public function Screens()
	{
		return $this->belongsToMany('App\Screen');
	}
}
