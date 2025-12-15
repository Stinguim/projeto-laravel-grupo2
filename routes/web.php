<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
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
    Route::get("/dashboard",function(){return view("dashboard");})->defaults('title', 'Dashboard');
    Route::get("/users",function(){return view("users");})->defaults('title', 'Users');
    Route::get("/accommodations",function(){return view("accommodations");})->defaults('title', 'Accommodations');
    Route::get("/schedule",function(){return view("schedule");})->defaults('title', 'Schedule');

    Route::get("/settings", function(){return view("settings");});
    Route::delete("/settings/{id}",[UserController::class, "destroy"] )->name("settings.destroy");
});



