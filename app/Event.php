<?php

declare(strict_types=1);

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Event extends Model
{
    /**
     * Date fields.
     *
     * @var array
     */
    protected $dates = array(
        'starttime',
        'endtime',
    );

    /**
     * Fields of specific types.
     *
     * @var array
     */
    protected $casts = array(
        'is_public' => 'boolean',
    );

    /**
     * Guarded fields.
     *
     * @var array
     */
    protected $guarded = array(
        'id',
    );

    /**
     * Fields to add to json output.
     *
     * @var array
     */
    protected $appends = array(
        'image_url',
    );

    /**
     * An event has a number of participants.
     */
    public function participants() : Relation
    {
        return $this->belongsToMany(User::class, 'events_participants')->wherePivot('is_attending', 1)->withPivot('is_host');
    }

    /**
     * Lists all hosts of an event.
     */
    public function hosts() : Relation
    {
        return $this->belongsToMany(User::class, 'events_participants')->wherePivot('is_host', 1);
    }

    /**
     * An event has invited users.
     */
    public function invites() : Relation
    {
        return $this->belongsToMany(User::class, 'events_participants')->wherePivot('is_attending', 0)->withPivot('is_host');
    }

    /**
     * Get the url of an image.
     */
    public function getImageUrlAttribute() : string
    {
        return $this->image ? asset('/storage/' . $this->image) : '';
    }
}
