<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login( Request $request)
    {
        //Validate the form data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //Attempt to log the user in
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            //Authentication passed
            return redirect()->intended(route('admin.dashboard'));
        }

        //Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
