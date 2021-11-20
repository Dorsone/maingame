<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateNewPasswordRequest;
use App\Http\Requests\UserPasswordRecoverRequest;
use App\Models\User;
use App\Services\SendSmsService;
use App\Services\UserService;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
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
     * @param UserService $userService
     */
    public function __construct(SendSmsService $sendSmsService, UserService $userService)
    {
        $this->middleware('guest')->except('logout');
        $this->sendSmsService = $sendSmsService;
        $this->userService = $userService;
    }

    /**
     * Returns page login
     * @return Factory|View
     */
    public function showLoginForm()
    {
        return view('gzone.pages.auth');
    }

    /**
     * Returns page forgot password
     * @return Factory|View
     */
    public function sendLetterPage()
    {
        return view("gzone.pages.forgot_password");
    }

    /**
     * Returns page enter recover code
     * @param UserPasswordRecoverRequest $request
     * @return Factory|View
     * @throws Exception
     */
    public function forgotPassword(UserPasswordRecoverRequest $request)
    {
        $user = $this->sendSmsService->sendRecoveryCode($request->validated());
        return view('gzone.pages.enter_recover_code', [
            "user" => $user
        ]);
    }

    /**
     * Returns page recover password
     * @param User $user
     * @param Request $request
     * @return Factory|View|RedirectResponse
     */
    public function checkRecoverCode(User $user, Request $request)
    {
        $recover_code = implode("", $request->codes);

        if ($user->recover_code != $recover_code) {
            return redirect()->route("send.letter");
        }

        return view("gzone.pages.recover_password", [
            "user" => $user
        ]);
    }

    /**
     * Returns index page, after changing password
     * @param User $user
     * @param UserCreateNewPasswordRequest $request
     * @return RedirectResponse
     */
    public function changePassword(User $user, UserCreateNewPasswordRequest $request)
    {
        $this->userService->recoverPassword($user, $request->validated());
        return redirect()->route("site.index");
    }
}
