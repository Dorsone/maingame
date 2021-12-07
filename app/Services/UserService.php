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
     * @param User $user
     * @param array $validated
     */
    public function updateUserInformation(User $user, array $validated)
    {
        $user->update($validated);
        $user->save();
    }

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

    /**
     * @param User $user
     * @param array $validated
     */
    public function changeEmailForUser(User $user, array $validated)
    {
        $user->update($validated);
        $user->save();
    }

    /**
     * Add documents for user
     * @param array $validated
     * @return mixed
     */
    public function addUserDocument(array $validated)
    {
        /** @var User $user */
        $user = auth()->user();
        $user->addMedia($validated['document'])->toMediaCollection("user_documents");
        return $user->getMedia("user_documents")->last();
    }

    /**
     * Delete user's account
     */
    public function deleteAccount()
    {
        /** @var User $user */
        $user = auth()->user();
        $user->delete();
    }
}