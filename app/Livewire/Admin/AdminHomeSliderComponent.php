<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlide;

class AdminHomeSliderComponent extends Component
{

    public function destroy(string $id) {
        HomeSlide::destroy($id);
        session()->flash('message', 'Slide supprimée avec succès');
    }

    public function render()
    {
        $slides = HomeSlide::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.admin-home-slider-component', compact('slides'));
    }
}
