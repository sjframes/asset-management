<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $users = User::orderBy('name')->get();

    return view('users.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('users.create');
}

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{

    $request->validate([
    'name' => 'required',
    'username' => 'required|unique:users,username',
    'email' => 'nullable|unique:users,email',
    'password' => 'required|confirmed|min:6',
]);


    User::create([
        'name' => $request->name,
        'username' => $request->username,
        'employee_id' => $request->employee_id,
        'department' => $request->department,
        'designation' => $request->designation,
        'phone' => $request->phone,
        'email' => $request->email,
        'role' => $request->role,
        'status' => $request->status,
        'password' => Hash::make($request->password)
    ]);

    ActivityLog::create([
    'user_name' => auth()->user()->name,
    'action' => 'Create User',
    'description' => 'Created user: '.$request->name,
]);

    return redirect('/users')
        ->with('success','User Created Successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $user = User::findOrFail($id);

    return view('users.edit', compact('user'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $user->update([
        'name' => $request->name,
        'employee_id' => $request->employee_id,
        'department' => $request->department,
        'designation' => $request->designation,
        'phone' => $request->phone,
        'email' => $request->email,
        'role' => $request->role,
        'status' => $request->status,
    ]);

    ActivityLog::create([
    'user_name' => auth()->user()->name,
    'action' => 'Update User',
    'description' => 'Updated user: '.$request->name,
]);

    return redirect('/users')
        ->with('success', 'User Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $user = User::findOrFail($id);

    if($user->role == 'admin')
    {
        return back()->with(
            'error',
            'Admin accounts cannot be deleted.'
        );
    }
    $userName = $user->name;

    $user->delete();

    ActivityLog::create([
    'user_name' => auth()->user()->name,
    'action' => 'Delete User',
    'description' => 'Deleted user: '.$userName,
]);

    return back()->with(
        'success',
        'User deleted successfully.'
    );
}

public function resetPassword($id)
{
    $user = User::findOrFail($id);

    $newPassword = $user->employee_id . '@123';

    $user->password = Hash::make($newPassword);

    $user->save();

    ActivityLog::create([
    'user_name' => auth()->user()->name,
    'action' => 'Reset Password',
    'description' => 'Reset password for user: '.$user->name,
]);

    return redirect('/users')
    ->with('success',
        'Password reset successfully. New password: ' . $newPassword);
}

    
}
