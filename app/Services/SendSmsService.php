<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

/**
 * Class SendSmsService
 * @package App\Services
 */
class SendSmsService
{
    public function sendMail(array $validated)
    {
        $to_name = "Sherlock";
        $to_email = $validated["email"];
        $data = array("random_number" => random_int(1000, 9999));
        Mail::send("site.auth.recovery_letter", $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject("Регистрация MainGame");
            $message->from(env("MAIL_USERNAME"), "test");
        });
    }
}