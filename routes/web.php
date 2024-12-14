<?php

use App\Http\Controllers\FaskesController;
use Illuminate\Support\Facades\Route;
use App\Models\Faskes;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [FaskesController::class, 'index']);

Route::get('/api/faskes', [FaskesController::class, 'getGeoJson']);

route::get('/about', function () {
    return view('about');
});


