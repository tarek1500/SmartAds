<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ad extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'path', 'user_id', 'size', 'duration'
    ];
    protected $appends = [
        'url'
    ];
    public function getUrlAttribute($value)
    {
        return Storage::url($this->attributes['path']);
    }

	public function User()
	{
		return $this->belongsTo('App\User');
	}
}
