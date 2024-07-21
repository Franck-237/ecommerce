<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.wishlist-component');
    }

    public function removeFromWishlist($product_id) {
        foreach(Cart::instance('wishlist')->content() as $witem) {
            if($witem->id==$product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                return redirect()->route('shop');
            }
        }
    }
}
