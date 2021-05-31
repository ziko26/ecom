<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show products
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            "products" => Product::latest()->paginate(6),
            "categories" => Category::has("products")->get(),
            
        ]);
    }

      /**
     * Show products by categories
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductsByCategory(Category $category)
    {
        $products = $category->products()->paginate(6);
        return view('home')->with([
            "products" => $products,
            "categories" => Category::has("products")->get(),
            
        ]);
    }
}
