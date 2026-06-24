<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/api/map-data', [MapController::class, 'getMapData']);
