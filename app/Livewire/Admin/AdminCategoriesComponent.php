<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class AdminCategoriesComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug() {
        $this->slug = Str::slug($this->name);
    }

    /*public function updated($fields) {
        $this-validateOnly($fields, [
            'name'=>'required',
            'slug'=>'required'
        ]);
    }*/

    public function storeCategory() {
        /*$this->validate([
            'name'=>'required',
            'slug'=>'required'
        ]);*/
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Catégorie crée avec succès');
    }

    public function render()
    {
        return view('livewire.admin.admin-categories-component');
    }
}
