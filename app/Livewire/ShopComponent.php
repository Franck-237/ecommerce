<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\Avis;
use Cart;

class ShopComponent extends Component
{
    public $pageSize = 12;
    public $orderBy = "Par défaut";

    public $min_value = 0;
    public $max_value = 75000;

    public $comment;
    public $product_id;
    public $user_id;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Produit ajouté au panier');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size) {
        $this->pageSize = $size;
    }

    public function changeOrderBy ($order) {
        $this->orderBy = $order;
    }

    public function addToWishlist($product_id, $product_name, $product_price) {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        return redirect()->route('shop.wishlist');
    }

    public function removeFromWishlist($product_id) {
        foreach(Cart::instance('wishlist')->content() as $witem) {
            if($witem->id==$product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                return redirect()->route('shop');
            }
        }
    }

    public function render()
    {
        if($this->orderBy == 'Prix: Petit au plus grand')
        {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Prix: Grand au plus petit')
        {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Nouveautés')
        {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        }
        else
        {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->paginate($this->pageSize);
        }
        $avis = Product::all();
        $nproducts = Product::latest()->take(3)->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.shop-component', compact('products', 'categories', 'nproducts', 'avis'));
    }

    public function submitComment()
    {
        $avis = new Avis();
        $avis->product_id = $this->product_id;
        $avis->user_id = auth()->id();
        $avis->comment = $this->comment;
        $avis->save();
        return redirect()->route('shop');
        session()->flash('success_message', 'Votre commentaire a été ajouté.');
    }
}
