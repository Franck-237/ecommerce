<?php

namespace App\Livewire;

use Livewire\Component;

class CartIconComponent extends Component
{
    public $refreshComponent = false;
    
    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
