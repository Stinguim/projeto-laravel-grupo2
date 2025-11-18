<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("auth.authenticate");
});

Route::get('/create_account', function () {
    return view('create_account');
});

Route::get("/register",[RegisterController::class, "create_account"]);

Route::post("/register",[RegisterController::class, "store"]);

Route::post("/logout",[LogoutController::class, "destroy"])
    ->middleware("auth");
