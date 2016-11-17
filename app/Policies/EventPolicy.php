<?php

declare(strict_types=1);

namespace App\Policies;

use App\User;
use App\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Check whether a user can see an event.
     *
     * @return bool
     */
    public function see(User $user, Event $event)
    {
        if ($event->is_public) {
            return true;
        } elseif ($event->hosts()->find($user->id)) {
            return true;
        } elseif ($event->participants()->find($user->id)) {
            return true;
        } elseif ($event->invites()->find($user->id)) {
            return true;
        }

        return false;
    }

    /**
     * Check whether a user can edit an event.
     *
     * @return bool
     */
    public function edit(User $user, Event $event)
    {
        if ($event->hosts()->find($user->id)) {
            return true;
        }

        return false;
    }
}
