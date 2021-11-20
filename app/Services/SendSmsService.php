<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;

/**
 * Class SendSmsService
 * @package App\Services
 */
class SendSmsService
{
    /**
     * Sends recovery code to user`s email
     * @param array $validated
     * @return mixed
     * @throws Exception
     */
    public function sendRecoveryCode(array $validated)
    {
        $user = User::query()->where("email", $validated["email"])->get()->first();
        $to_name = $user->username;
        $to_email = $validated["email"];
        $recover_code = random_int(1000, 9999);
        $data = array("random_number" => $recover_code);
        $user->recover_code = $recover_code;
        $user->save();

        Mail::send("gzone.pages.recovery_letter", $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject("Восстановление пароля MainGame");
            $message->from(env("MAIL_USERNAME"), "MainGame");
        });

        return $user;
    }

    /**
     * Sends registration letter to user`s email
     * @param array $validated
     * @throws Exception
     */
    public function sendRegistrationLetter(array $validated)
    {
        $to_name = "Регистрация";
        $to_email = $validated["email"];
        $recover_code = random_int(1000, 9999);
        $data = array("random_number" => $recover_code);

        Mail::send("gzone.pages.registration_letter", $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject("Регистрация MainGame");
            $message->from(env("MAIL_USERNAME"), "MainGame");
        });
    }
}