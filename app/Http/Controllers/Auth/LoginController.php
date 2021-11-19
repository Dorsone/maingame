<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\SendSmsService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = "/";
    private $sendSmsService;

    /**
     * Create a new controller instance.
     *
     * @param SendSmsService $sendSmsService
     */
    public function __construct(SendSmsService $sendSmsService)
    {
        $this->middleware('guest')->except('logout');
        $this->sendSmsService = $sendSmsService;
    }

    /**
     * Show the application's login form.
     *
     * @return View
     */
    public function showLoginForm()
    {
        return view('site.auth.entrance');
    }

    public function sendLetterPage()
    {
        return view("site.auth.password_recovery_send_letter");
    }

    public function forgotPassword(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email"
        ]);
        $this->sendSmsService->sendMail($validated);
        return \view("site.auth.password_recovery_code");
    }

    public function recoveryCodePage()
    {
        //
    }
}
