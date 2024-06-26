<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AddCategoriesComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate(10);
        return view('livewire.admin.add-categories-component', compact('categories'));
    }
}
