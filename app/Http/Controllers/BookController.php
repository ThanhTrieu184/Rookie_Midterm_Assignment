<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index() {
        $books = DB::table('books')->get();
        foreach ($books as $book) {
            echo '<h2>'.$book->book_title.'</h2><br>';
        }
        // return view("/hello",compact('users'));
    }
}
