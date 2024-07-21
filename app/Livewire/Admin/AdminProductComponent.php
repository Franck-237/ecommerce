<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductComponent extends Component
{

    use WithPagination;

    public function destroy(string $id) {
        Product::destroy($id);
        session()->flash('message', 'produit supprimé avec succès');
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(12);
        return view('livewire.admin.admin-product-component', compact('products'));
    }
}
