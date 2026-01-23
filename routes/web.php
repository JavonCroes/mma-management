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
    Route::get("/fighters", function () {
        $fighters = \App\Models\Fighter::all();
        return view("fighters.fighters", compact("fighters"));
    })->name("fighters.index");
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

Route::middleware(["auth", "admin"])
    ->prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::get("/dashboard", function () {
            $fighters = \App\Models\Fighter::all();
            return view("admin.dashboard", compact("fighters"));
        })->name("dashboard");

        Route::resource(
            "fighters",
            \App\Http\Controllers\Admin\FighterController::class,
        )->except(["index"]);
    });

require __DIR__ . "/auth.php";
