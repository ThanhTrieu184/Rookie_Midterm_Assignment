<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add_to_cart($id) {
        $book = DB::table('books')->where('id','=',$id)->get();
        if(!$book) {
            return redirect()->back()->with('failed', 'Can not find book!');
        }
        $cart = Session::get('cart');
        if(!$cart) {
            $cart = [$id => [
                "book_id"=>$book[0]->id,
                "book_title" => $book[0]->book_title,
                "quantity" =>1,
                "book_price" => $book[0]->book_price,
                "book_cover_photo" => $book[0]->book_cover_photo]];
            Session::put('cart', $cart);
            return redirect()->back()->with('success', 'Book added to cart successfully!');
        }
        if(isset($cart[$id])) {
            $cart[$id]["quantity"]++;
            Session::put('cart', $cart);
            return redirect()->back()->with('success', 'Book update to cart successfully!');
        }

        $cart[$id] = [
            "book_id"=>$book[0]->id,
            "book_title" => $book[0]->book_title,
            "quantity" => 1,
            "book_price" => $book[0]->book_price,
            "book_cover_photo" => $book[0]->book_cover_photo
        ];
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Another book added to cart successfully!');
        
    }

    public function delete_cart($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        Session::put('cart', $cart);
        // return redirect()->back();
        return $cart;
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            Session::put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
}
