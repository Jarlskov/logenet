<?php

namespace App;

use App\Event;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A user may be participating in some events.
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'events_participants')->withPivot('is_host');
    }
}
