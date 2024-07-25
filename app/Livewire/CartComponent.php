<?php

namespace App\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Product;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->route('shop.cart');
    }

    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        if ($qty <= 0) {
            Cart::instance('cart')->remove($rowId);
        } else {
            Cart::instance('cart')->update($rowId, $qty);
        }
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $cartItems = Cart::instance('cart')->content();
        $products = Product::whereIn('id', $cartItems->pluck('id'))->get();

        foreach ($products as $product) {
            // Ajouter un attribut calculé pour le prix utilisé dans le panier
            $product->cart_price = $product->sale_price ?? $product->regular_price;

            foreach ($cartItems as $item) {
                if ($item->id == $product->id) {
                    $item->price = $product->cart_price; // Mettre à jour le prix dans le panier
                }
            }
        }

        return view('livewire.cart-component', [
            'products' => $products,
            'cartItems' => $cartItems,
        ]);
    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', 'Produit supprimé du panier');
        return redirect()->route('shop.cart');
    }

    public function clearAll()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('shop.cart');
    }
}
