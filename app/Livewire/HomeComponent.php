<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\HomeSlide;
use App\Models\Product;
use Cart;

class HomeComponent extends Component
{
    protected $layout = 'components.layouts.app';

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Produit ajouté au panier');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $slides = HomeSlide::where('status', 1)->get();
        $fproducts = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component', compact('slides', 'lproducts', 'fproducts'));
    }
}
