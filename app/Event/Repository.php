<?php

declare(strict_types=1);

namespace App\Event;

use App\Event;
use App\User;

use Illuminate\Support\Collection;

class Repository
{
    /**
     * Get a list of events accessible by a user.
     *
     * @param User $user
     *
     * @return Collection
     */
    public function getForUser(User $user) : Collection
    {
        return $user->events()->orderBy('starttime')->orderBy('endtime')->get();
    }
}
