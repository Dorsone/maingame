<?php

namespace App\Services;

use App\Models\User;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * Updating user`s password
     * @param User $user
     * @param array $validated
     */
    public function recoverPassword(User $user, array $validated)
    {
        $user->update([
            "password" => bcrypt($validated["password"])
        ]);
        $user->save();
    }
}