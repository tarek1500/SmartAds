<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', 'action', 'user_id'
    ];

	public function User()
	{
		return $this->belongsTo('App\User');
	}
}
