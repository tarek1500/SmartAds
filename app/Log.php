<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action', 'user_id'
    ];

	public function User()
	{
		return $this->belongsTo('App\User');
	}
}
