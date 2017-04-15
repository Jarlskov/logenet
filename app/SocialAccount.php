<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SocialAccount extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    /**
     * Returns the user object associated with the social account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
