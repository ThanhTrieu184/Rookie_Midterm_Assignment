<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function get_book_comments($book_id) {
        $comments = DB::table('reviews')
                    ->where('book_id',$book_id)
                    ->get();
        $cmt_cnt = $comments->count();
        $each_star_cnt = DB::table('reviews')
                        ->select('rating_start',DB::raw('count(rating_start) as cnt'))
                        ->where('book_id',$book_id)
                        ->groupBy('rating_start')
                        ->get();
        return response()->json([
            'data'=>$comments,
            'total'=>$cmt_cnt,
            'each_star_cnt'=>$each_star_cnt
        ]);
    }
}
