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
    public function get_book_comments($book_id, $paginate=5, $sort='desc', $filter=0) {
        if($sort == 'asc') {
            $sortBy = 'review_date asc';
        }
        else {
            $sortBy = 'review_date desc';
        }
        if($filter == 0) {
            $filterBy = [1,2,3,4,5];
        }
        else{
            $filterBy = [$filter];
        }
        $each_star_cnt = DB::table('reviews')
                        ->select('rating_start',DB::raw('count(rating_start) as cnt'))
                        ->where('book_id',$book_id)
                        ->groupBy('rating_start')
                        ->get();
        $ave = DB::table('reviews')
                            ->select(DB::raw('round(avg(cast(rating_start as int)),1) as avg'), DB::raw('count(rating_start) as cnt'))
                            ->where('book_id',$book_id)
                            ->get();
        $comments =  DB::table('reviews')
                    ->where('book_id',$book_id)
                    ->whereIn('rating_start', $filterBy)
                    ->orderByRaw($sortBy)
                    ->paginate($paginate);

        return response()->json(["comment"=>$comments,"each_star_cnt"=>$each_star_cnt,"ave"=>$ave]);
        
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
