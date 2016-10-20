<?php

declare(strict_types=1);

namespace App\Event;

use App\Event;
use App\User;
use Date;

class Service
{
    /**
     * Create a new event.
     *
     * @param string $title
     * @param string $location
     * @param Date $starttime
     * @param Date $endtime
     * @param string $description
     */
    public function create(User $user, string $title, string $location, Date $starttime, Date $endtime, string $description) : Event
    {
        $event = Event::create([
            'title' => $title,
            'location' => $location,
            'starttime' => $starttime,
            'endtime' => $endtime,
            'description' => $description,
        ]);

        $user->events()->save($event, ['is_host' => true]);

        return $event;
    }
}
