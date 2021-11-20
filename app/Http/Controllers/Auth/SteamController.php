<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class SteamController
 * @package App\Http\Controllers\Auth
 */
class SteamController extends Controller
{
    /**
     * The SteamAuth instance.
     *
     * @var SteamAuth
     */
    protected $steam;

    /**
     * The redirect URL.
     *
     * @var string
     */
    protected $redirectURL = '/';

    /**
     * AuthController constructor.
     *
     * @param SteamAuth $steam
     */
    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    /**
     * Redirect the user to the authentication page
     *
     * @return RedirectResponse|Redirector
     */
    public function redirectToSteam()
    {
        return $this->steam->redirect();
    }

    /**
     * Get user info and log in
     *
     * @return RedirectResponse|Redirector
     * @throws GuzzleException
     */
    public function handle()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {
                $user = $this->findOrNewUser($info);

                Auth::login($user, true);

                return redirect($this->redirectURL); // redirect to site
            }
        }
        return $this->redirectToSteam();
    }

    /**
     * Getting user by info or created if not exists
     *
     * @param $info
     * @return Builder|Model
     */
    protected function findOrNewUser($info)
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
