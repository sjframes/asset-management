<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where(
    'username',
    $request->username
)->first();

if($user && $user->status == 'inactive')
{
    return back()->with(
        'error',
        'Your account has been deactivated. Contact Administrator.'
    );
}

        if (Auth::attempt([
    'username' => $request->username,
    'password' => $request->password
])) {

    $request->session()->regenerate();

    auth()->user()->update([
        'last_login' => now()
    ]);

    return redirect('/dashboard');
}

        return back()->with('error', 'Invalid Username or Password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}