<?php

declare(strict_types=1);

namespace App\Models;

use App\Beer;
use App\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Brewery extends Model
{
    /**
     * A brewery produces a number of beers.
     */
    public function beers() : Relation
    {
        return $this->hasMany(Beer::class);
    }

    /**
     * A brewery is located in a country.
     */
    public function country() : Relation
    {
        return $this->belongsTo(Country::class);
    }
}
