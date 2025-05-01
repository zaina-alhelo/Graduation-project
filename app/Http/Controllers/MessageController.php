<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use App\Notifications\CustomVerifyEmail;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });

        User::created(function ($user) {
            if (!$user->hasVerifiedEmail()) {
                $user->notify(new CustomVerifyEmail($user)); 
            }
        });

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

       Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password'); // يمكنك تخصيص الصفحة هنا
        });

        Fortify::requestPasswordResetLinkUsing(function (Request $request) {
            $status = Password::sendResetLink($request->only('email'));
            
            if ($status == Password::RESET_LINK_SENT) {
                return back()->with('status', 'We have sent a password reset link to your email.');
            }
            
            return back()->withErrors(['email' => trans($status)]);
        });
    }
}
