<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('books/filter/on-sale/{paginate?}/{sort?}',[BookController::class, 'get_on_sale_books'])->name('books.onsale');
Route::get('books/recommended',[BookController::class, 'get_recommended_books'])->name('books.recommended');
Route::get('books/popular',[BookController::class, 'get_popular_books'])->name('books.popular');
Route::get('books/filter/category/{category}/{paginate?}/{sort?}',[BookController::class, 'filter_by_category'])->name('books.filter_categogy');
Route::get('books/filter/author/{author}/{paginate?}/{sort?}',[BookController::class, 'filter_by_author'])->name('books.filter_author');
Route::get('books/filter/rating-star/{star}/{paginate?}/{sort?}',[BookController::class, 'filter_by_rating'])->name('books.filter_rating');
Route::apiResource('books',BookController::class);
Route::get('books/{id}/comments/{paginate?}/{sort?}/{filter?}',[CommentController::class, 'get_book_comments'])->name('book.comment');
Route::get('categories',[CategoryController::class,'index'])->name('categories');
Route::get('authors',[AuthorController::class,'index'])->name('authors');
Route::get('comments',[CommentController::class,'get_rating_star'])->name('comments');
Route::post('comments',[CommentController::class,'upload_comment'])->name('comments.create');
Route::post('orders',[OrderController::class,'placeOrder'])->name('orders.create');


