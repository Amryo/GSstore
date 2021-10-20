<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class FrontEndController extends Controller
{
    /** INDEX view -> Show main page  */
    public function index()
    {

        $product = Product::get(['id', 'quantity', 'name', 'price', 'image']);
        $newProducts = Product::latest('created_at')->inRandomOrder()->limit(8)->get();
        $categories = Category::get(['id', 'name', 'image']);
        return view('user.index', [
            'product' => $product,
            'categories' => $categories,
            'newproducts' => $newProducts,
        ]);
    }

    /** INDEX view -> Show main page  */
    public function products()
    {
        $products = Product::latest()->get();
        return view('user.products', ['products' => $products]);
    }

    public function filterProducts(Request $request)
    {
        $products = Product::select('*')->orderBy($request->name)->get();
        return view('user.products', ['products' => $products]);
    }

    public function productDetails($slug)
    {

        $product = Product::where('slug', $slug)->first();
        return view('user.productDetails', ['product' => $product]);
    }

    public function cart(CartRepository $cart)
    {


        $cookie = Cookie::get('cart_cookie_id');
        $cart = Cart::where('cookie_id', $cookie)->get();

        return view('user.cart', ['cart' => $cart]);
    }
}
