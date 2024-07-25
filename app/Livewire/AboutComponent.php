<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Avis;

class AboutComponent extends Component
{
    public function render()
    {
        $avis = Avis::orderBy('created_at', 'DESC')->get()->take(6);
        return view('livewire.about-component', compact('avis'));
    }
}
