<?php

declare(strict_types=1);

namespace App\Event;

use App\Event;
use App\User;

use Date;
use Illuminate\Http\UploadedFile;

class Service
{
    /**
     * Create a new event.
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

    /**
     * Update an existing event.
     */
    public function update(Event $event, string $title, string $location, Date $starttime, Date $endtime, string $description)
    {
        $event->title = $title;
        $event->location = $location;
        $event->starttime = $starttime;
        $event->endtime = $endtime;
        $event->description = $description;

        $event->save();
    }

    /**
     * Update the event image.
     */
    public function updateImage(Event $event, UploadedFile $image)
    {
        $path = $image->store('public/images/events');
        $event->image = $path;
        $event->save();
    }
}
