<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService;
use Socialite;
 

class SocialAuthController extends Controller
{
	public function redirect()
	{
		return Socialite::driver('facebook')->redirect();
	}

	public function callback(SocialAccountService $service)
	{
		// when facebook call us a with token
		$user = $service->createOrGetUser(Socialite::driver('facebook')->user());

		auth()->login($user,true);

		return redirect()->to('/account');
	}
}