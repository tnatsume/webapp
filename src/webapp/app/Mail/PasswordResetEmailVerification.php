<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    //追加
    public $token;
    public $mail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $token, TestMail $mail)
    {
        $this->token = $token;
        $this->mail = $mail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            // ->from(config('mail.from.address'), config('mail.from.name'))
            // ->to($notifiable->email)
            ->subject('パスワードを再設定してください')
            // ->text('emails.password_reset')
            ->view('auth.email.reset_password')
            ->with([
                'url' => route('password.reset', [
                    'token' => $this->token,
                    'email' => $notifiable->email,
                  ]),
            ]);
    }
}
