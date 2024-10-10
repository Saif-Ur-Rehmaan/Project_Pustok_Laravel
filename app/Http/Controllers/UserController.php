<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\UserRole;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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
        ], [
            'name.regex' => 'The name may only contain letters and spaces.',
        ]);

        try {

            dd($request->all());

            if ($role->count() != 0) {
                $role_id = $role->select("id")->first()["id"];
            } else {

                UserRole::create([
                    'name' => 'user',
                ]);

                $role = UserRole::all()->where('name', 'user');

                $role_id = $role->select("id")->first()["id"];
            }
            $uploadedImg = $ValidCredentials['ProfilePic'];

            $imagePath = '//storage/' . $request->file('ProfilePic')->store('UserProfilePics', 'public');
            User::create([
                'role_id' => $role_id,
                'image' => env('APP_URL') . $imagePath,
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
            return redirect('/login-register')->with('fail', 'An Error Occur While Registering Please try again later' . $ex->getMessage());
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
    function logoutUser(Request $req)
    {

        Auth::logout();
        $req->session()->regenerate(); //prevent from Fixation attack
        return redirect('/');
    }
    function SendReview(Request $req)
    {
        $req->validate([
            "message" => 'required',
            "bookId" => 'required|numeric|exists:books,id',
            "reviewStar" => 'required|numeric|in:1,2,3,4,5'
        ]);
        Review::create([
            'user_id' => Auth::user()->id,
            'book_id' => $req["bookId"],
            'reviewStars' => $req["reviewStar"],
            'comment' => $req["message"],

        ]);
        return back()->with('success', 'Review Added Successfully');
    }
    function DeleteReview($EncryptedId)
    {
        $ID = Crypt::decrypt($EncryptedId);
        if (!is_numeric($ID)) {
            return back()->with('fail', 'Comment Deletion failed: Invalid ID');
        }
        $deleted = Review::destroy($ID);
        if ($deleted) {
            return back()->with('success', 'Comment Deleted Successfully');
        } else {
            return back()->with('fail', 'Comment Deletion failed: Review not found');
        }
    }
}
