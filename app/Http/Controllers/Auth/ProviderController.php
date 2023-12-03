<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

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

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id
            ])->first();

            if (!$user) {
                if (User::where('email', $SocialUser->getEmail())->exists()) {
                    return to_route('login')->withToastError('This email uses a different method to login!');
                }

                $password = Str::random(12);
                $user = User::create([
                    'name' => $SocialUser->getName(),
                    'email' => $SocialUser->getEmail(),
                    'role' => 'user',
                    'username' => User::generateUserName($SocialUser->getNickname()),
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token,
                    'password' => $password
                ]);

                $user->sendEmailVerificationNotification();

                $user->update([
                    'password' => Hash::make($password)
                ]);
            }
            Auth::login($user);
            return to_route('home')->withToastSuccess('Hello ' . Auth::user()->name . '!,  Welcome back.');
        } catch (\Exception $e) {
            return to_route('login');
        }
    }
}
