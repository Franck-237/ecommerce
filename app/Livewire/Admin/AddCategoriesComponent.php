<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class AddCategoriesComponent extends Component
{
    use WithPagination;

    public $category_id;

    /*public function deleteCategory() {
        $category = Category::find($this->category_id);
        if ($category) {
            // Supprimer la catégorie
            $category->delete();

            // Message de succès
            session()->flash('message', 'Catégorie supprimée avec succès');
        } else {
            // Gérer le cas où la catégorie n'a pas été trouvée
            session()->flash('error', 'La catégorie spécifiée n\'existe pas.');
        }
    }*/

    public function destroy(string $id) {
        Category::destroy($id);
        session()->flash('message', 'Catégorie supprimée avec succès');
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate(10);
        return view('livewire.admin.add-categories-component', compact('categories'));
    }
}
