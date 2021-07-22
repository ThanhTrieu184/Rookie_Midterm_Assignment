<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;

class OrderController extends Controller
{
    public function placeOrder(Request $request) {
        $books = json_decode($request->getContent());
        $total = $books->total;
        $carts = $books->carts;
        $items = $books->items;
        foreach($items as $item) {
            if(Book::find($item->bookId)==null){
                return response()->json(['data'=>$item->bookId]);
            }
        }
        if($items != null) {
            $id = DB::table('orders')->insertGetId(
                ['order_date' => today(), 'order_amount' => $total]
            );

            for($i=0; $i<count($items); $i++) {
                DB::table('order_items')->insert(
                    ['order_id' => $id, 'book_id' => $items[$i]->bookId, 'quantity'=>$items[$i]->amount, 'price'=>$carts[$i][0]->final_price]);
            }
            return response()->json(['data'=>'success']);
        }
        else {
            return response()->json(['data'=>'empty']);
        }
    }
}
