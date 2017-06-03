<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password', 'security', 'gender', 'address', 'role', 'balance'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'security', 'remember_token',
    ];

	public function Ads()
	{
		return $this->hasMany('App\Ad');
	}

	public function Notifications()
	{
		return $this->hasMany('App\Notification');
	}

	public function Logs()
	{
		return $this->hasMany('App\Log');
	}
}
