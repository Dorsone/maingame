<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\RecoveryCodeNotification;
use App\Notifications\RegistrationCodeNotification;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

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
        $recover_code = random_int(1000, 9999);

        Cache::put($user->username, $recover_code, 300);

        Notification::send($user, new RecoveryCodeNotification($validated["email"], $recover_code));
        return $user;
    }

    /**
     * Sends registration letter to user`s email
     * @param array $validated
     * @throws Exception
     */
    public function sendRegistrationLetter(array $validated)
    {
        $user = new User();
        $user->email = $validated["email"];
        $recover_code = random_int(1000, 9999);

        Cache::put($validated["email"], $recover_code, 300);

        Notification::send($user, new RegistrationCodeNotification($validated["email"], $recover_code));
    }
}