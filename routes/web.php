<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\BookController;



Route::get('{any}', function () {
    return view('index');
})->where('any', '.*');
