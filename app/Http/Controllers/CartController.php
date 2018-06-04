<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Products;
use Cart;

class CartController extends Controllers
{
    public function cart()
    {
        if(Request::isMethod('post')){
            $this->data['title']='Giỏ hàng của bạn';
            $product_id=Request::get('product_id');
            $product = Products::find($product_id);
            $cartInfo = [
                'id'=>$product_id,
                'name'=>$product->name,
                'price'=>$product->price,
                'qty'=>'1'
            ];
            Cart::add($cartInfo);
        }
        $cart = Cart::content();
        $this->data['cart']=$cart;
        return view('layout.cart',$this->data);
    }
}