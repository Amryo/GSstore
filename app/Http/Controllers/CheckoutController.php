<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Models\Order;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;
use RealRashid\SweetAlert\Facades\Alert;

class CheckoutController extends Controller
{
    public $cart;
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {

        return view('user.order', [
            'cart' => $this->cart,
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'billing_name' => 'required',
            'billing_email' => 'required',
            'billing_phone' => 'required',
            'billing_address' => 'required',
            'billing_city' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $request->merge([
                'total' => $this->cart->total(),
            ]);
            $order = Order::create($request->all());
            foreach ($this->cart->all() as $item) {

                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
            DB::commit();
            event(new OrderCreated($order));
            //$message = Alert::toast('success', 'Success');
            return redirect()->route('orders');
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
            $message = Alert::toast('success', 'falid');
        }
    }
}
