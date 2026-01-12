<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('dashboard'));

Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
Route::get('/', fn () => redirect()->route('dashboard'))->name('home');
Route::get('/fighters', fn () => view('fighters.index'))->name('fighters.index');
Route::get('/events', fn () => view('events.index'))->name('events.index');
