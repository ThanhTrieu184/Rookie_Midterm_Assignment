<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function index() {
        $authors = DB::table('authors')
                        ->orderBy('author_name')
                        ->get();
        return response()->json(['authors'=>$authors]);
    }
}
