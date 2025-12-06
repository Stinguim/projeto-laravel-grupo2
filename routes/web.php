<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get("/", [RegisterController::class, "show_login"]);

Route::post("/", [RegisterController::class, "authenticate"]);

Route::get("/register", [RegisterController::class, "show_register"]);

Route::post("/register", [RegisterController::class, "create"]);

Route::get("/dashboard",function(){return view("dashboard", ['username'=>$username]);});

Route::get("/settings", function(){return view("settings");});
