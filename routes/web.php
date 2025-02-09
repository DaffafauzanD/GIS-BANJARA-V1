<?php

use App\Http\Controllers\FaskesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [FaskesController::class, 'index']);

Route::get('/dashboard', [FaskesController::class, 'dashboard']);
Route::get('/usermanager', [FaskesController::class, 'usermanager']);
Route::get('/managepoint', [FaskesController::class, 'managepoint']);


Route::get('/home/filterByKodeKategori/{kodeKategori}', [FaskesController::class, 'filterByKodeKategori']);

Route::get('/api/faskes', [FaskesController::class, 'getGeoJson']);

Route::get('/about', function () {
    return view('about');
});


