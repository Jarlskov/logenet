<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;


class SocialAuthController extends Controller
{
    /**
     * Method to redirect to facebook if facebook login is chosen.
     *
     * @param Socialite $socialLite
     * @return mixed
     */
    public function redirect(Socialite $socialLite)
    {
        return $socialLite->driver('facebook')->redirect();
    }

    /**
     * Callback function called when we receive response from facebook.
     *
     * @param SocialAccountService $service
     * @param Guard $auth
     * @param Socialite $socialLite
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback(SocialAccountService $service, Guard $auth, Socialite $socialLite)
    {
        $user = $service->createOrGetUser($socialLite->driver('facebook')->user());

        $auth->login($user, true);

        return redirect()->to('/account');
    }
}