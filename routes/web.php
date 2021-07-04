<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\View;


Route::get('/', function () {
    return view('welcome');
});

Route::get('book',[BookController::class, 'index']);
Route::get('/home', function () {
    if (View::exists('homepage')) {
        return view('homepage');
    }
    else {
        echo 'Khong ton tai';
    }
        
})->name('home');

Route::get('/shop', function () {
    if (View::exists('shoppingpage')) {
        return view('shoppingpage');
    }
    else {
        echo 'Khong ton tai';
    }
        
})->name('shop');

Route::get('/about', function () {
    if (View::exists('aboutpage')) {
        return view('aboutpage');
    }
    else {
        echo 'Khong ton tai';
    }
        
})->name('about');

Route::get('/cart', function () {
    if (View::exists('cartpage')) {
        return view('cartpage');
    }
    else {
        echo 'Khong ton tai';
    }
        
})->name('cart');

Route::get('/detail', function () {
    if (View::exists('detailpage')) {
        return view('detailpage');
    }
    else {
        echo 'Khong ton tai';
    }
        
})->name('detail');