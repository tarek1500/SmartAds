<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'location'
    ];

	public function Screens()
	{
		return $this->hasMany('App\Screen');
	}
}
