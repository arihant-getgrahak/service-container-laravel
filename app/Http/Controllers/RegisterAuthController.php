<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterAuthController extends Controller
{
    public function index(){
        return view(view: "register");
    }
}
