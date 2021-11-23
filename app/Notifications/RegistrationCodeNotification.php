<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationCodeNotification extends Notification
{
    use Queueable;

    protected $recovery_code;

    /**
     * Create a new notification instance.
     *
     * @param integer $recovery_code
     */
    public function __construct($recovery_code)
    {
        $this->recovery_code = $recovery_code;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from(env('MAIL_USERNAME'), env('APP_NAME'))
                    ->subject("Регистрация MainGame")
                    ->view('gzone.pages.registration_letter', [
                        "random_number" => $this->recovery_code,
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
