<?php



namespace App\Repositories\Cart;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class SessionRepository implements CartRepository
{

    protected $key = 'Cart';
    public function all()
    {
        return Session::get($this->key);
    }

    public function add($item, $qty = null)
    {
        Session::push($this->key, $item);
    }

    public function clear()
    {
        Session::forget($this->key);
    }
}
