<?php



namespace App\Repositories\Cart;

use Illuminate\Support\Facades\Cookie;

class CookieRepository implements CartRepository
{

    protected $name = 'Cart';
    public function all()
    {


        $items = Cookie::get($this->name);

        if ($items) {
            return unserialize($items);
        }
        return [];
    }

    public function add($item)
    {
        $items = $this->all();
        $items[] = $item;
        Cookie::queue($this->name, serialize($items), 60 * 24 * 30);
    }

    public function clear()
    {
        Cookie::queue($this->name, '', -60);
    }
}
