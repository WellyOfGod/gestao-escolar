<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        if(auth()->check())
        {
            return redirect()->route(
                auth()->user()->is_admin ? 'admin' : 'home'
            );
        }

        return view('pages.login.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only(['email', 'password']);


        if(auth()->attempt($credentials, isset($request->remember)))
        {
            $request->session()->regenerate();

            return redirect()->route(
                auth()->user()->is_admin ? 'admin' : 'home'
            );
        }


        return back()->with('error', 'Dados informado inválidos!');
    }

    public function home()
    {
        return view('pages.users.home');
    }

    public function admin()
    {
        return view('pages.admin.home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
