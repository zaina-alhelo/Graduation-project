<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(str()->random(16)),
            ]
        );

        Auth::login($user, true);

                return redirect()->route('home'); 


    } catch (\Exception $e) {
        return redirect('/login')->with('error', 'Sign in with Google failed.');
    }
}


}
