<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $SocialUser = Socialite::driver($provider)->user();
            if (User::where('email', $SocialUser->getEmail())->where('provider', '<>', $provider)->exists()) {
                return redirect()->route('login')->withToastError('This email uses a different method to login!');
            }
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id
            ])->first();

            if (!$user) {
                $user = User::create([
                    'name' => $SocialUser->getName(),
                    'email' => $SocialUser->getEmail(),
                    'username' => User::generateUserName($SocialUser->getNickname()),
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token
                ]);
            }
            Auth::login($user);
            return redirect('/dashboard');
        } catch (\Exception $e) {
            return to_route('login');
        }
    }
}
