<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPasswordRecoverRequest;
use App\Services\SendSmsService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Create a new controller instance.
     * @param SendSmsService $sendSmsService
     */
    public function __construct(SendSmsService $sendSmsService)
    {
        $this->middleware('guest')->except('logout');
        $this->sendSmsService = $sendSmsService;
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
        $this->sendSmsService->sendRecoveryCode($request->validated());
        return view('gzone.pages.enter_recover_code');
    }

}
