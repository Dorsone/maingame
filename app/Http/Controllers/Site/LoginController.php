<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateNewPasswordRequest;
use App\Http\Requests\UserPasswordRecoverRequest;
use App\Models\User;
use App\Services\SendSmsService;
use App\Services\UserService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 * Class LoginController
 * @package App\Http\Controllers\Site
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = "/";

    /** @var SendSmsService $sendSmsService */
    private $sendSmsService;

    /** @var UserService $userService */
    private $userService;

    /**
     * Create a new controller instance.
     * @param SendSmsService $sendSmsService
     */
    public function __construct(SendSmsService $sendSmsService, UserService $userService)
    {
        $this->middleware('guest')->except('logout');
        $this->sendSmsService = $sendSmsService;
        $this->userService = $userService;
    }

    public function showLoginForm()
    {
        return view('gzone.pages.auth');
    }

    public function sendLetterPage()
    {
        return view("gzone.pages.forgot_password");
    }

    public function forgotPassword(UserPasswordRecoverRequest $request)
    {
        $user = $this->sendSmsService->sendRecoveryCode($request->validated());
        return view('gzone.pages.enter_recover_code', [
            "user" => $user
        ]);
    }

    public function checkRecoverCode(User $user, Request $request)
    {
        $recover_code = implode("", $request->codes);
        if ($user->recover_code == $recover_code) {
            return view("gzone.pages.recover_password", [
                "user" => $user
            ]);
        } else {
            return redirect()->route("send.letter");
        }
    }

    public function changePassword(User $user, UserCreateNewPasswordRequest $request)
    {
        $this->userService->recoverPassword($user, $request->validated());
        return redirect()->route("site.index");
    }

}
