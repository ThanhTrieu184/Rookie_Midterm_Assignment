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
                    ->select('books.*','authors.author_name','categories.category_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date',
                            DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN books.book_price - discounts.discount_price ELSE 0 END as on_sale'),
                            DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN discounts.discount_price ELSE books.book_price END as final_price'))
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

    public function get_on_sale_books($paginate =20, $sort="on-sale") {
        if($sort == 'popular'){
            $sortBy = 'cnt desc';
        }
        else if(($sort == 'price-asc')){
            $sortBy = 'final_price asc';
        }
        else if(($sort == 'price-desc')){
            $sortBy = 'final_price desc';
        }
        else {
            $sortBy = 'books.book_price - discounts.discount_price desc';
        }
        $on_sale_books = DB::table('books')
                        ->join('discounts','books.id','=','discounts.book_id')
                        ->join('authors','books.author_id','=','authors.id')
                        ->leftJoin('reviews','books.id','reviews.book_id')
                        ->select('books.id','books.book_title','books.book_price','books.book_cover_photo','books.author_id','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date',
                                DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN books.book_price - discounts.discount_price ELSE 0 END as on_sale'),
                                DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN discounts.discount_price ELSE books.book_price END as final_price'),
                                DB::raw('count(reviews.book_id) as cnt'))
                        ->where(function($query) {
                                $query->where('discounts.discount_start_date','<=',today())
                                        ->where('discounts.discount_end_date','>=',today());})
                        ->orWhere(function($query) {
                            $query->where('discounts.discount_start_date','<=',today())
                                    ->where('discounts.discount_end_date',null);})
                        ->groupBy('books.id','books.book_title','books.book_price','books.book_cover_photo','books.author_id','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date')
                        ->orderByRaw($sortBy)
                        ->paginate($paginate);
        return response()->json($on_sale_books);
    }

    public function get_recommended_books() {
        $recommended_books = DB::table('reviews')
                            ->join('books','reviews.book_id','=','books.id')
                            ->join('authors','books.author_id','=','authors.id')
                            ->leftJoin('discounts','reviews.book_id','=','discounts.book_id')               
                            ->select('reviews.book_id',DB::raw('round(avg(cast(rating_start as int)),1) as avg'),'books.book_title','books.book_price','books.book_cover_photo','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date',
                                    DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN books.book_price - discounts.discount_price ELSE 0 END as on_sale'),
                                    DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN discounts.discount_price ELSE books.book_price END as final_price'))
                            ->groupBy('reviews.book_id','books.book_title','books.book_price','authors.author_name','discounts.discount_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date')
                            ->orderByDesc('avg')
                            ->orderBy('final_price')
                            ->limit(8)
                            ->get();
        return response()->json(['data'=>$recommended_books]);  
        
    }

    public function get_popular_books() {
        $popular_books = DB::table('reviews')
                        ->join('books','reviews.book_id','=','books.id')
                        ->join('authors','books.author_id','=','authors.id')
                        ->leftJoin('discounts','reviews.book_id','=','discounts.book_id')               
                        ->select('reviews.book_id',DB::raw('count(reviews.book_id) as cnt'),'books.book_title','books.book_price','authors.author_name','books.book_cover_photo','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date',
                                DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN books.book_price - discounts.discount_price ELSE 0 END as on_sale'),
                                DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN discounts.discount_price ELSE books.book_price END as final_price'))
                        ->groupBy('reviews.book_id','books.book_title','books.book_price','authors.author_name','discounts.discount_price','books.book_cover_photo','discounts.discount_start_date','discounts.discount_end_date')
                        ->orderByDesc('cnt')
                        ->orderBy('final_price')
                        ->limit(8)
                        ->get();
        return response()->json(['data'=>$popular_books]);   
    }

    public function filter_by_category($category, $paginate =20, $sort='on-sale') {
        if($sort == 'popular'){
            $sortBy = 'cnt desc';
        }
        else if(($sort == 'price-asc')){
            $sortBy = 'final_price asc';
        }
        else if(($sort == 'price-desc')){
            $sortBy = 'final_price desc';
        }
        else {
            $sortBy = 'on_sale desc';
        }
        $books = DB::table('books')
                ->join('categories','books.category_id','=','categories.id')
                ->join('authors','books.author_id','authors.id')
                ->where('categories.id','=',$category)
                ->leftJoin('reviews','books.id','reviews.book_id')
                ->leftJoin('discounts','books.id','=','discounts.book_id')
                ->select('books.id','books.book_title','books.book_price','books.book_cover_photo','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date',
                        DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN books.book_price - discounts.discount_price ELSE 0 END as on_sale'),
                        DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN discounts.discount_price ELSE books.book_price END as final_price'),
                        DB::raw('count(reviews.book_id) as cnt'))
                ->groupBy('books.id','books.book_title','books.book_price','books.book_cover_photo','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date')
                ->orderByRaw($sortBy)
                ->paginate($paginate); 
        return response()->json($books);
    }
    public function filter_by_author($author,$paginate =20, $sort='on-sale') {
        if($sort == 'popular'){
            $sortBy = 'cnt desc';
        }
        else if(($sort == 'price-asc')){
            $sortBy = 'final_price asc';
        }
        else if(($sort == 'price-desc')){
            $sortBy = 'final_price desc';
        }
        else {
            $sortBy = 'on_sale desc';
        }
        $books = DB::table('books')
                ->join('authors','books.author_id','=','authors.id')
                ->where('authors.id','=',$author)
                ->leftJoin('discounts','books.id','=','discounts.book_id')
                ->leftJoin('reviews','books.id','reviews.book_id')
                ->select('books.id','books.book_title','books.book_price','books.book_cover_photo','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date',
                        DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN books.book_price - discounts.discount_price ELSE 0 END as on_sale'),
                        DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN discounts.discount_price ELSE books.book_price END as final_price'),
                        DB::raw('count(reviews.book_id) as cnt'))
                ->groupBy('books.id','books.book_title','books.book_price','books.book_cover_photo','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date')
                ->orderByRaw($sortBy)
                ->paginate($paginate);
        return response()->json($books);
    }
    public function filter_by_rating($star, $paginate =20, $sort='on-sale') {
        if($sort == 'popular'){
            $sortBy = 'cnt desc';
        }
        else if(($sort == 'price-asc')){
            $sortBy = 'final_price asc';
        }
        else if(($sort == 'price-desc')){
            $sortBy = 'final_price desc';
        }
        else {
            $sortBy = 'on_sale desc';
        }
        $books = DB::table('reviews')
                ->join('books','reviews.book_id','=','books.id')
                ->join('authors','books.author_id','=','authors.id')
                ->leftJoin('discounts','reviews.book_id','=','discounts.book_id')               
                ->select('books.id',DB::raw('round(avg(cast(rating_start as int)),1) as avg'),'books.book_title','books.book_price','books.book_cover_photo','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date',
                        DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN books.book_price - discounts.discount_price ELSE 0 END as on_sale'),
                        DB::raw('CASE WHEN (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date >= CURRENT_DATE) or (discounts.discount_start_date <= CURRENT_DATE and discounts.discount_end_date is null) THEN discounts.discount_price ELSE books.book_price END as final_price'),
                        DB::raw('count(reviews.book_id) as cnt'))
                ->groupBy('books.id','books.book_title','books.book_price','books.book_cover_photo','authors.author_name','discounts.discount_price','discounts.discount_start_date','discounts.discount_end_date')
                ->havingRaw('round(avg(cast(rating_start as int)),1) >= ?',[$star])
                ->orderByRaw($sortBy)
                ->paginate($paginate);
        return response()->json($books);
    }

}
