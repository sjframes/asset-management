<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request)
{
    $request->validate([
        'username' => 'required',
        'employee_id' => 'required',
    ]);

    $user = User::where('username', $request->username)
                ->where('employee_id', $request->employee_id)
                ->first();

    if (!$user) {

        return back()->with(
            'error',
            'Username or Employee ID is incorrect.'
        );

    }

    $user->update([

        'reset_requested'     => true,
        'reset_requested_at'  => Carbon::now(),

    ]);

    return redirect()
        ->route('forgot.password')
        ->with(
            'success',
            'Your password reset request has been sent to the administrator.'
        );
}
}