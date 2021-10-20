<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Repositories\Cart\CartRepository;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\Component;

class navbarWebsite extends Component
{
    public $cart;
    public $counter;
    public $cookie;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
        $this->cookie = Cookie::get('cart_cookie_id');
        $this->counter = Cart::where('cookie_id', $this->cookie)->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar-website');
    }
}
