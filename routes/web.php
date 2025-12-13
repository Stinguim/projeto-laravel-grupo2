<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.authenticate');
});

Route::middleware('guest')->controller(RegisterController::class)->group(function () {
    Route::get("/login", "showLogin");
    Route::post("/login", "login");

    Route::get("/register", "showRegister");
    Route::post("/register", "register");
});
Route::post("/logout", [RegisterController::class, "logout"]);

Route::middleware('auth')->group(function () {
    Route::get("/dashboard",function(){return view("dashboard");});
    Route::get("/settings", function(){return view("settings");});
});



