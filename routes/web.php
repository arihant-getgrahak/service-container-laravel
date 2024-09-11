<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginAuthController;
use App\Http\Controllers\RegisterAuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/test", [TestController::class, "index"]);
Route::get("/test", [TestController::class, "test"]);

Route::get("/login", [LoginAuthController::class, "index"]);
Route::get("/register", [RegisterAuthController::class, "index"]);
Route::get("/dashboard", [DashboardController::class, "index"]);

// Post

Route::post("/login", [LoginAuthController::class, "login"]);
Route::post("/register", [RegisterAuthController::class, "register"]);