<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function RegisterUser(Request $request)
    {
        $ValidCredentials = $request->validate([
            'ProfilePic' => ['image', 'required', 'mimes:png,jpg,jpeg'],
           'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ],[
            'name.regex' => 'The name may only contain letters and spaces.',
        ]);

        try {
            $role_id = UserRole::all()->where('name', 'user')->select("id")->first()["id"]; //selecting id of record where role is user
            $uploadedImg = $ValidCredentials['ProfilePic'];

            $imagePath = $request->file('ProfilePic')->store('UserProfilePics');
            User::create([
                'role_id' => $role_id,
                'image' => $imagePath,
                'displayName' => $ValidCredentials['name'],
                'email' => $ValidCredentials['email'],
                'password' => $ValidCredentials['password'],
                'firstName' => null,
                'lastName' => null,
                'provider' => null,
                'providerId' => null,
            ]);
            return redirect('/login-register')->with('success', 'User Registered Successfully .Now you have to Login');
        } catch (Exception $ex) {
            return redirect('/login-register')->with('fail', 'An Error Occur While Registering Please try again later');
        }
    }

    function LoginUser(Request $req)
    {
        // validating
        $VD = $req->validate([
            'LoginEmail' => ['required', 'email'],
            'LoginPassword' => ['required', 'min:8'],
        ]);
        try {
            if (Auth::attempt(['email' => $VD['LoginEmail'], 'password' => $VD['LoginPassword']])) {
                $req->session()->regenerate(); //prevent from fixation attacks
                return redirect()->intended('/')->with('success', 'User Login Successfully');
            } else {
                return redirect('/login-register')->with('fail', 'Invalid credentials. Please try again.');
            }
        } catch (Exception $th) {
            return redirect('/login-register')->with('fail', 'An Error Occur While Registering Please try again later');
        }
    }
    function logoutUser(Request $req) {
        
        Auth::logout();
        $req->session()->regenerate();//prevent from Fixation attack
        return redirect('/');
    }
}
