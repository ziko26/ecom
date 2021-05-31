<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // return cart items
    public function index(){
        return view("cart.index")->with([
            "items" => \Cart::getContent()

        ]);
    }
    
    // add product to cart
    public function addProductToCart(Request $request, Product $product){
        \Cart::add(array(
            "id" => $product->id,
            "name" => $product->title,
            "price" => $product->price,
            "quantity" => $request->qty,
            "attributes" => array(),
            "associatedModel" => $product,
        ));
        return redirect()->route('cart.index');

    }

     // update product in cart
     public function updateProductInCart(Request $request, Product $product){
        \Cart::update($product->id, array(
           'quantity' => array(
               'relative' => false,
               'value' => $request->qty
           )
        ));
        return redirect()->route('cart.index');

    }

        // remove product from cart
        public function removeProductFromCart(Product $product){
        \Cart::remove($product->id);
        return redirect()->route('cart.index');

    }
}
