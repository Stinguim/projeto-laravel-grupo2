<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get("/", [RegisterController::class, "show_login"]);

Route::post("/", [RegisterController::class, "authenticate"]);

Route::get("/register", [RegisterController::class, "show_register"]);

Route::post("/register", [RegisterController::class, "create"]);

Route::post("/logout", [RegisterController::class, "logout"]);

Route::get("/dashboard",function(){return view("dashboard");});

Route::get("/settings", function(){return view("settings");});

#ver estas duas routes juntamente com as suas funcoes no register controler
//Route::get("/primeira", [RegisterController::class, "layoutmainview"])->name("primeira.view");
//
//Route::get("/segunda", [RegisterController::class, "homepageview"])->name("segunda.view");
