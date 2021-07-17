<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\Api\BookController;
use PhpParser\Node\Expr\Cast\Array_;

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

    public function get_rating_star() {
        $book = new BookController();
        
        return response()->json(['data' => [['star'=>1,'cnt'=>$book->filter_by_rating(1)->original['total']],
                                            ['star'=>2,'cnt'=>$book->filter_by_rating(2)->original['total']],
                                            ['star'=>3,'cnt'=>$book->filter_by_rating(3)->original['total']],
                                            ['star'=>4,'cnt'=>$book->filter_by_rating(4)->original['total']],
                                            ['star'=>5,'cnt'=>$book->filter_by_rating(5)->original['total']]]
                                ]); 

    }
}
