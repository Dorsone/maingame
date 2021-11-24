<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SteamService
 * @package App\Services
 */
class SteamService
{
    /**
     * Getting user by info or created if not exists
     *
     * @param $info
     * @return Builder|Model
     */
    public function findOrNewUser($info)
    {
        $user = User::query()->where('steamid', $info->steamID64)->first();

        if (!is_null($user)) {
            return $user;
        }

        return User::query()->create([
            'username' => $info->personaname,
            'first_name' => $info->realname,
            'steamid' => $info->steamID64,
            'password' => bcrypt($info->steamID64),
        ]);

    }
}