<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\BookController;

// Route::get('book1',[BookController::class, 'index']);
Route::get('/', function () {
    if (View::exists('homepage')) {
        return view('homepage');
    }
    else {
        echo 'Khong ton tai';
    }
        
})->name('homepage');

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

Route::resource('/book',BookController::class);

Route::get('cart/{id}',[CartController::class, 'add_to_cart'])->name('cart.add');