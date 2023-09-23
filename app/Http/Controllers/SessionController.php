<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function login() {
        return view("auth.login");
    }

    public function store(Request $req) {
        $validation = Validator::make($req->all(), [
            "email" => "required|string|email",
            "password" => "required|string"
        ]);

        if($validation->fails()) {
            return redirect()->route("login")->withErrors($validation)->withInput();
        }

        $userCredentials = [
            "email"    => $req->email,
            "password" => $req->password
        ];

        if(!Auth::attempt($userCredentials)) {
            $validation->errors()->add("email", __("auth.failed"));
            $validation->errors()->add("password", __("auth.failed"));
            return redirect()->route("login")->withErrors($validation)->withInput();
        }

        return redirect()->intended();
    }
}
