<?php


namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;
use App\Models\User;

class SocialAccountService
{
    /**
     * Method returns a user object based on either a social account or regular user account.
     *
     * @param ProviderUser $providerUser
     * @param string $provider
     * @return static
     */
    public function createOrGetUser(ProviderUser $providerUser, $provider = 'facebook')
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => bcrypt(str_random(8)),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}