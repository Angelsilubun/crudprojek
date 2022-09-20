<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function post_login(Request $request)
    {
        $req = $this->validate($request, [
            "email" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($req)) {
            return redirect()->intended("/admin/dashboard");
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/login");
    }
}
