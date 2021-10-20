<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * @var \App\Repositories\Cart\CartRepository
     */
    public $cart;
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
    public function index(CartRepository $cart)
    {

        $cookie = Cookie::get('cart_cookie_id');
        $cart = Cart::where('cookie_id', $cookie)->get();

        $total = $this->cart->total();
        return view('user.cart', ['cart' => $cart, 'total' => $total]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['integer', 'min:1', function ($attr, $value, $fail) {
                $id = request()->input('product_id');
                $product = Product::find($id);
                if ($value > $product->quantity) {
                    $fail(__('Quantity greater than quantity in stock'));
                }
            }],
        ]);

        $cart = $this->cart->add($request->input('product_id'), $request->post('quantity', 0));

        if ($request->expectsJson()) {
            return $cart;
        }
        return redirect()->route('viewCart');
    }


    public function updateQuantity(Request $request)
    {

        foreach ($request->id as $key => $id) {
            $cart = Cart::find($id);
            $cart->update([
                'quantity' => $request->quantity[$key],
            ]);
        }
        return redirect()->route('checkoutView');
    }

    public function destroy($id)
    {
        $cart = Cart::where('product_id', $id)->first();
        $cart->delete();
        Alert::success('Success Title', 'Product remove succesfully');
        return redirect()->back();
    }

    public function DeleteAllSelectedProducts(Request $request)
    {

        $delete_all_id = explode(",", $request->delete_all_id);
        Cart::whereIn('id', $delete_all_id)->Delete();
        Alert::success('success', 'Products Delete Successfully');
        return redirect()->back();
    }
}
