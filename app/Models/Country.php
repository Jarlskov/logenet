<?php

declare(strict_types=1);

namespace App\Models;

use App\Brewery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Country extends Model
{
    /**
     * A country has a number of breweries.
     */
    public function breweries() : Relation
    {
        return $this->hasMany(Brewery::class);
    }
}
