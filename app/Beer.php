<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Beer extends Model
{
    /**
     * A beer is made by a brewery.
     */
    public function brewery() : Relation
    {
        $this->belongsTo(Brewery::class);
    }
}
