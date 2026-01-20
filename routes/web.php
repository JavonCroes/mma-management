<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
})->name("login");

// Dashboard only for logged in users
Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

// Secured routes only for logged in users
Route::middleware("auth")->group(function () {
    // MMA Routes
    Route::get("/fighters", fn() => view("fighters.fighters"))->name(
        "fighters.index",
    );
    Route::get("/events", fn() => view("events.events"))->name("events.index");

    // Breeze profile routes
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit",
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update",
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy",
    );
});

require __DIR__ . "/auth.php";
