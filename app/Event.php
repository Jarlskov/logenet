<?php

namespace App\Models;

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
}
