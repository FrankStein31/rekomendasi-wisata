<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function login() : View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('pages.login');
        }
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'inputEmail' => 'required|email',
            'inputPassword' => 'required',
        ]);

        $data = [
            'email' => $request->input('inputEmail'),
            'password' => $request->input('inputPassword'),
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            Session::flash('error', 'Email atau Password Salah.');
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
