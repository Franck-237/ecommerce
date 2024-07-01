<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Product;
use Livewire\withPagination;

class CartComponent extends Component
{

    use WithPagination;

    public $refreshComponent = false;

    public function increaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product ->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->refreshComponent = !$this->refreshComponent;
    }

    public function decreaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product ->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->refreshComponent = !$this->refreshComponent;
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.cart-component', compact('products'));
    }

    public function destroy($id) {
        Cart::instance('cart')->remove($id);
        $this->refreshComponent = !$this->refreshComponent;
        session()->flash('success_message', 'Produit supprimer du panier');
    }

    public function clearAll() {
        Cart::instance('cart')->destroy();
        $this->refreshComponent = !$this->refreshComponent;
    }
}
