<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class SearchComponent extends Component
{
    public $pageSize = 12;
    public $orderBy = "Par défaut";

    public $q;
    public $search_term;

    public function mount() {
        $this->fill(request()->only('q'));
        $this->search_term = '%'.$this->q . '%';
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Produit ajouté au panier');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size) {
        $this->pageSize = $size;
    }

    public function changeOrderBy ($order) {
        $this->orderBy = $order;
    }

    public function render()
    {
        if($this->orderBy == 'Prix: Petit au plus grand')
        {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Prix: Grand au plus petit')
        {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        }
        else if($this->orderBy == 'Nouveautés')
        {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        }
        else
        {
            $products = Product::where('name', 'like', $this->search_term)->paginate($this->pageSize);
        }
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('livewire.search-component', compact('products', 'categories'));
    }
}

