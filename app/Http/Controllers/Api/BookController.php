<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Discount;
use App\Models\Author;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = DB::table('books')
                    ->join('authors','books.author_id','authors.id')
                    ->join('categories','books.category_id','categories.id')
                    ->leftJoin('discounts','books.id','discounts.book_id')
                    ->where('books.id',$id)
                    ->select('books.*','authors.author_name','categories.category_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date')
                    ->get();
        return response()->json(['data'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_on_sale_books() {
        $on_sale_books = DB::table('books')
                        ->join('discounts','books.id','=','discounts.book_id')
                        ->join('authors','books.author_id','=','authors.id')
                        ->select('books.id','books.book_title','books.book_price','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date',DB::raw('books.book_price - discounts.discount_price as discount_amount'))
                        ->where(function($query) {
                                $query->where('discounts.discount_start_date','<=',today())
                                        ->where('discounts.discount_end_date','>=',today());})
                        ->orWhere(function($query) {
                            $query->where('discounts.discount_start_date','<=',today())
                                    ->where('discounts.discount_end_date',null);})  
                        ->orderByRaw('books.book_price - discounts.discount_price DESC')
                        ->limit(10)
                        ->get();
        return response()->json(['data'=>$on_sale_books]);
    }

    public function get_recommended_books() {
        $recommended_books = DB::table('reviews')
                            ->join('books','reviews.book_id','=','books.id')
                            ->join('authors','books.author_id','=','authors.id')
                            ->leftJoin('discounts','reviews.book_id','=','discounts.book_id')               
                            ->select('reviews.book_id',DB::raw('round(avg(cast(rating_start as int)),1) as avg'),'books.book_title','books.book_price','authors.author_name','discounts.discount_price')
                            ->groupBy('reviews.book_id','books.book_title','books.book_price','authors.author_name','discounts.discount_price')
                            ->orderByDesc('avg')
                            ->orderBy('discounts.discount_price')
                            ->orderBy('books.book_price')
                            ->limit(8)
                            ->get();
        return response()->json(['data'=>$recommended_books]);  
        
    }

    public function get_popular_books() {
        $popular_books = DB::table('reviews')
                        ->join('books','reviews.book_id','=','books.id')
                        ->join('authors','books.author_id','=','authors.id')
                        ->leftJoin('discounts','reviews.book_id','=','discounts.book_id')               
                        ->select('reviews.book_id',DB::raw('count(reviews.book_id) as cnt'),'books.book_title','books.book_price','authors.author_name','discounts.discount_price')
                        ->groupBy('reviews.book_id','books.book_title','books.book_price','authors.author_name','discounts.discount_price')
                        ->orderByDesc('cnt')
                        ->orderBy('discounts.discount_price')
                        ->orderBy('books.book_price')
                        ->limit(8)
                        ->get();
        return response()->json(['data'=>$popular_books]);   
    }

    public function filter_by_category($category) {
        $books = DB::table('books')
                ->join('categories','books.category_id','=','categories.id')
                ->where('categories.category_name','=',$category)
                ->leftJoin('discounts','books.id','=','discounts.book_id')
                ->select('books.*','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date')
                ->get();
        return response()->json(['data'=>$books,'count'=>$books->count()]);
    }
    public function filter_by_author($author) {
        $author = str_replace('-',' ',$author);
        $books = DB::table('books')
                ->join('authors','books.author_id','=','authors.id')
                ->where('authors.author_name','=',$author)
                ->leftJoin('discounts','books.id','=','discounts.book_id')
                ->select('books.*','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date')
                ->get();
        return response()->json(['data'=>$books, 'count'=>$books->count()]);
    }
    public function filter_by_rating($star) {
        $books = DB::table('reviews')
                ->join('books','reviews.book_id','=','books.id')
                ->join('authors','books.author_id','=','authors.id')
                ->leftJoin('discounts','reviews.book_id','=','discounts.book_id')               
                ->select('reviews.book_id',DB::raw('round(avg(cast(rating_start as int)),1) as avg'),'books.book_title','books.book_price','authors.author_name','discounts.discount_price')
                ->groupBy('reviews.book_id','books.book_title','books.book_price','authors.author_name','discounts.discount_price')
                ->havingRaw('round(avg(cast(rating_start as int)),1) >= ?',[$star])
                ->orderByDesc('avg')
                ->orderBy('discounts.discount_price')
                ->orderBy('books.book_price')
                // ->limit(8)
                ->get();
        return response()->json(['data'=>$books, 'count'=>$books->count()]);
    }

}
