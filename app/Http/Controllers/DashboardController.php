<?php

namespace App\Http\Controllers;
use App\Helper\Fascade\AuthFascade;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard");
    }
    public function logout()
    {
        AuthFascade::logout();
        return redirect("/login");
    }
}
