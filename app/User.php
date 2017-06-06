<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password', 'role', 'balance', 'confirmed'
        // 'security', 'gender', 'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
        // 'security',
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
