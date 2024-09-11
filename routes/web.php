<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\LoginAuthController;
use App\Http\Controllers\RegisterAuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", [LoginAuthController::class, "index"]);
Route::get("/register", [RegisterAuthController::class, "index"]);

// Post

Route::post("/login", [LoginAuthController::class, "login"]);
Route::post("/register", [RegisterAuthController::class, "register"]);

Route::group(["middleware" => ["custom_auth.users"]], function () {
    Route::get("/dashboard", [DashboardController::class, "index"]);
    Route::get("/logout", [DashboardController::class, "logout"])->name("logout");
});