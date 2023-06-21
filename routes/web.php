<?php

use App\Http\Controllers\KlasemenController;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\SkorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/klub', KlubController::class);
Route::resource('/skor-pertandingan', SkorController::class);
Route::resource('/klasemen', KlasemenController::class);
