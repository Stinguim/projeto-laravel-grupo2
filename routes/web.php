<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\CleaningController;
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
    Route::get('/users', [UserController::class, "index"])->name("users.index");
    Route::get("/users/{id}/edit",[UserController::class, "edit"])->name("users.edit");
    Route::put("/users/{id}/update",[UserController::class, "update"])->name("users.update");

    Route::get("/dashboard",function(){return view("dashboard");})->defaults('title', 'Dashboard');

    Route::get("/accommodations", [AccommodationController::class, 'index']);
    Route::get("/accommodations/create", [AccommodationController::class, 'create']);
    Route::post("/accommodations/create", [AccommodationController::class, 'store']);
    Route::get("/accommodations/{id}", [AccommodationController::class, 'accommodation']);
    Route::patch("/accommodations/{id}", [AccommodationController::class, 'approve']);
    Route::get("/accommodations/{id}/schedule-cleaning", [AccommodationController::class, 'scheduleCleanupForm']);
    Route::post("/accommodations/{id}/schedule-cleaning", [AccommodationController::class, 'scheduleCleanup']);

    Route::get("/schedule", [CleaningController::class, 'showSchedule'])->defaults('title', 'Schedule');
    Route::get("/schedule/{id}", [CleaningController::class, 'showScheduleLodging'])->name('schedule.id')->defaults('title', 'Schedule');

    Route::get("/settings", [UserController::class, "settings"] )->name('settings.index')->defaults('title', 'Settings');
    Route::delete("/settings/{id}",[UserController::class, "destroy"] )->name("settings.destroy");
});
