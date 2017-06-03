<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'ipaddress', 'zone_id'
    ];

	public function Ads()
	{
		return $this->belongsToMany('App\Ad');
	}

	public function Zone()
	{
		return $this->belongsTo('App\Zone');
	}
}
