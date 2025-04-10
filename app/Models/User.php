<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\EmailVerificationCodeNotification;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'role',
        'phone',    
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isDoctor()
    {
        return $this->role === 'doctor';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    /**
     * Generate a verification code and store it in the database.
     */
    public function generateVerificationCode()
    {
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $this->verification_code = $code;
        $this->verification_code_expires_at = now()->addMinutes(10);
        $this->save();

        return $code;
    }

    /**
     * Send the email verification notification with a code.
     */
    public function sendEmailVerificationNotification()
    {
        $verificationCode = $this->generateVerificationCode(); 
        $this->notify(new EmailVerificationCodeNotification($verificationCode));
    }

    /**
     * Verify the code entered by the user.
     */
    public function verifyCode($code)
    {
        if ($this->verification_code === $code &&
            $this->verification_code_expires_at &&
            now()->lt($this->verification_code_expires_at)) {
            // Mark email as verified
            $this->email_verified_at = now();
            $this->save();

            return true;
        }

        return false;
    }

    public function conversationsAsDoctor()
    {
        return $this->hasMany(Conversation::class, 'doctor_id');
    }

    public function conversationsAsPatient()
    {
        return $this->hasMany(Conversation::class, 'patient_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    /**
     * Send password reset notification
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
