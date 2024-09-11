<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAuthController extends Controller
{
    public function index(){
        return view("login");
    }
}
