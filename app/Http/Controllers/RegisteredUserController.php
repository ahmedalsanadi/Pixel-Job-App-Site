<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\ImageFile;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Auth;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $userAttributes = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "email", " unique:users,email"], // unique in users table specifically on email column
            "password" => ["required", "confirmed", Password::min(6)],
        ]);


        $employerAttributes = $request->validate([
            "employer" => ["required", "string"],
            "logo" => ["required", ImageFile::types(["png", "jpg", "jpeg", "webp", "svg"])->max(2048)],
        ]);


        $user = User::create($userAttributes);
        // store logo on logos folder and Specify the public disk
        $logoPath = $request->logo->store("logos", "public"); // its stored in storage/app/public/logos

        // store employer with logo_path
        $user->employer()->create([
            "name" => $employerAttributes["employer"],
            "logo" => $logoPath
        ]);

        Auth::login($user);

        return redirect("/");
    }
}
