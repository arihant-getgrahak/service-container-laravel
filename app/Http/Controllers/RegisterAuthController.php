<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Fascade\AuthFascade;

class RegisterAuthController extends Controller
{
    public function index()
    {
        return view(view: "register");
    }

    public function register(Request $request)
    {
        $res = AuthFascade::register($request->all());

        if ($res["success"]) {
            return redirect("/login")->with("success", $res["message"]);
        }
        return redirect("")->back()->with("error", $res["message"]);
    }
}
