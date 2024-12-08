<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', function () {
    return view('home');
});

route::get('/about', function () {
    return view('about');
});
