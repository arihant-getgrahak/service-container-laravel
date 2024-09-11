<?php

namespace App\Helper\Fascade;

use Illuminate\Support\Facades\Facade;
use App\Helper\AuthHelper;


class AuthFascade extends Facade
{
   protected static function getFacadeAccessor()
   {
      return AuthHelper::class;
   }
}