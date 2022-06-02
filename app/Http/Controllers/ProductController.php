<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index(){
        //fetch all data from table of modelname Product and pass it onto the variable $data
        $data = Product::all();
        return view('product', ['products' => $data]);
    }

    function details($id){
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }

    function search(Request $req){
        //return $req->input();
        // select * from products where name like input requested with the name 'query'
        $data = Product::where('name', 'like', '%'.$req->input('query').'%')->get();
        //return $data;
        return view('search', ['products'=>$data]);
    }

    function addToCart(Request $req){
        //if the (post) request has a session with a session-name of 'user'
        if($req->session()->has('user')){
            //return "Hello";
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');

        } else {
            return redirect('/login');
        }
    }

    static function cartItem(){
        // get the user-session
        $userId = Session::get('user')['id'];
        // return Cart where user_id = $userId, then get count() from the database
        return Cart::where('user_id', $userId)->count();
    }

    // use join - with product_id, you can join with products table to get data. Same between user_id and user table
    function cartList(){
        // If session contains a user
        if(Session::get('user')){
            // get the userId-session
            $userId = Session::get('user')['id'];
        }
        else { 
            // else initialise userId at null
            $userId = null; 
        }

        $products = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $userId)
        ->select('products.*', 'carts.id as cart_id')
        ->get();

        return view('cartlist', ['products' => $products]);
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(){
        // If session contains a user
        if(Session::get('user')){
            // get the userId-session
            $userId = Session::get('user')['id'];
            
            $total =  $products = DB::table('carts')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('carts.user_id', $userId)
            ->sum('products.price');

            if(!empty($products)){
                return view('ordernow', ['total' => $total]);
            } else{
                return redirect('cartlist');
            }
        }
        else { 
            return redirect('cartlist');
        }
    }

    function orderPlace(Request $req){
        // If session contains a user
        if(Session::get('user')){
            // get the userId-session
            $userId = Session::get('user')['id'];
        }
        else { 
            // else initialise userId at null
            $userId = null; 
        }
        // get all cart-data from a user_id
        $allCart = Cart::where('user_id', $userId)->get();
        
        // loop through all cart-data
        foreach($allCart as $cart){
            // create an instance of the class Order
            $order = new Order;
            // initialise the feld product_id with the value of the cart with keyword 'product_id'
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            // get payment from the request and initialise the value to the feld payment_method
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            // get address from the request and initialise the value to the feld address
            $order->address = $req->address;
            // save the Order-instance
            $order->save();

            Cart::where('user_id', $userId)->delete();
        }
        return redirect('/');
    }

    function myOrders(){
        // If session contains a user
        if(Session::get('user')){
            // get the userId-session
            $userId = Session::get('user')['id'];
        }
        else { 
            // else initialise userId at null
            $userId = null; 
        }

        // get all product orders from a user in json-format
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $userId)
        ->get();

        return view('myorders', ['orders' => $orders]);
    }
}
