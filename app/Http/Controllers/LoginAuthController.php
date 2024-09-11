<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Fascade\AuthFascade;


class LoginAuthController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $res = AuthFascade::login($request->only("email", "password"));
        if ($res["success"]) {
            return redirect("/dashboard")->with("success", $res["message"]);
        }
        return redirect()->back()->with("error", $res['message']);
    }
}
