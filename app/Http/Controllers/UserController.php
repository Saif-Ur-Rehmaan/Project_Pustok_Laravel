<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function RegisterUser(Request $request)
    {
        $ValidCredentials = $request->validate([
            'name' => ['alpha', 'required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ]);
        dd($ValidCredentials['name']);
        $isCreated = User::create([
            'role_id'=>UserRole::all()->select('id')->where('name','user')->first(),
            'image',
            'displayName',
            'firstName',
            'lastName',
            'provider',
            'providerId',
            'email',
            'email_verified_at',
            'password',
        ]);

        return redirect('/login-register')->with('success', 'User Registered Successfully');
    }
}
