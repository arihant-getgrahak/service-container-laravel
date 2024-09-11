<?php

namespace App\Http\Controllers;

use App\Helper\Fascade\AuthFascade;

class TestController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function test()
    {
        AuthFascade::test();
    }
}
