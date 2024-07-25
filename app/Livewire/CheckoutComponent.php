<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Coupon;
use Cart;

class CheckoutComponent extends Component
{
    public $couponCode;

    public function applyCoupon()
    {
        $coupon = Coupon::where('code', $this->couponCode)
                        //->where('used', '<', 2) // Limite de 2 utilisations
                        ->first();

        if (!$coupon) {
            session()->flash('message', 'Coupon invalide.');
            return;
        }

        // Calculer la réduction
        $discount = Cart::instance('cart')->subtotal() * (20 / 100);

        // Appliquer la réduction au montant total du panier
        Cart::instance('cart')->setDiscount($discount);

        session()->flash('message', 'Coupon appliqué avec succès.');
    }

    public function render()
    {
        $cartItems = Cart::instance('cart')->content();
        $subtotal = Cart::instance('cart')->subtotal();
        return view('livewire.checkout-component', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
        ]);
    }
}
