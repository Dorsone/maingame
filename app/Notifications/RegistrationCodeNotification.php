<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationCodeNotification extends Notification
{
    use Queueable;

    protected $recovery_code;
    protected $channel_name;

    /**
     * Create a new notification instance.
     *
     * @param $channel_name
     * @param integer $recovery_code
     */
    public function __construct($channel_name, $recovery_code)
    {
        $this->channel_name = $channel_name;
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
