<?php


namespace App\Services;

use App\Models\User;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    public function recoverPassword(User $user, array $validated)
    {
        $user->update([
            "password" => bcrypt($validated["password"])
        ]);
        $user->save();
    }
}