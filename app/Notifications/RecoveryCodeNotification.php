<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Class RecoveryCodeNotification
 * @package App\Notifications
 */
class RecoveryCodeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $channelName;
    protected $message;
    protected $recovery_code;

    /**
     * Create a new notification instance.
     *
     * @param string $channelName
     * @param int $recovery_code
     */
    public function __construct($channelName, $recovery_code)
    {
        $this->channelName = $channelName;
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
     * @param $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from(env('MAIL_USERNAME'), env('APP_NAME'))
                    ->subject("Восстановление пароля")
                    ->view('gzone.pages.recovery_letter', [
                        "random_number" => $this->recovery_code,
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'message' => $this->message
        ];
    }
}
