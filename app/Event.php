<?php

declare(strict_types=1);

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Date fiels.
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
     * An event has a number of participants.
     */
    public function participants()
    {
        return $this->belongsToMany(User::class, 'events_participants')->withPivot('is_host');
    }
}
