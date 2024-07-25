<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Avis;

class AllAvisComponent extends Component
{
    public function render()
    {
        $avis = Avis::all();
        return view('livewire.all-avis-component', compact('avis'));
    }
}
