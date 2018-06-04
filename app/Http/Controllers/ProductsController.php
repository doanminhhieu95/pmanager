<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Cart;
use Session;

class ProductsController extends Controller{
    public function getIndex(){
        $products = Products::all();
        return view('shop.index',['products'=>$products]);
    }
    public function getAddtoCart(Request $request,$id){
        $product=Products::find($id);
        
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        //dd($oldCart);
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
        
        $request->session()->put('cart',$cart);
        //dd($request->session()->get('cart'));
        //dd($request);
        return redirect()->route('Product.index');
    }
    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view('shop.shopping-cart',[
            'products'=>$cart->items,
            'totalPrice'=>$cart->totalPrice
        ]);
    }
}