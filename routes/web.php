<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get("/", function(){return view("auth.authenticate");});

Route::get("/register", function(){return view("auth.register");});

Route::get("/dashboard",function(){return view("dashboard");});



Route::get("/settings", function(){return view("settings");});
