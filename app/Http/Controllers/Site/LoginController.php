<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('gzone.pages.auth');
    }

    public function forgotPassword()
    {
        return view('gzone.pages.forgot-password');
    }
}
