<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    public $token; 
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
{
    return (new MailMessage)
            ->subject('Reset password')
        ->view('emails.reset-password', [
            'token' => $this->token,
            'user' => $notifiable
        ]);
}
}
