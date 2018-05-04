<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}
	
    // Competition to User Relationship
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Competition to Entry Relationship
    public function faqs()
    {
        return $this->hasMany(FAQ::class);
    }

    // Competition to Entry Relationship
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
