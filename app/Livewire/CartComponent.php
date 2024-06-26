<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{

    public function increaseQuantity($rowId) {
        $product = Cart::get($rowId);
        $qty = $product ->qty + 1;
        Cart::update($rowId, $qty);
    }

    public function decreaseQuantity($rowId) {
        $product = Cart::get($rowId);
        $qty = $product ->qty - 1;
        Cart::update($rowId, $qty);
    }

    public function render()
    {
        return view('livewire.cart-component');
    }

    public function destroy($id) {
        Cart::remove($id);
        session()->flash('success_message', 'Produit supprimer du panier');
    }

    public function clearAll() {
        Cart::destroy();
    }
}
