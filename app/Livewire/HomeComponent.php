<?php

namespace App\Livewire;

use Livewire\Component;

class HomeComponent extends Component
{
    protected $layout = 'components.layouts.app';

    public function render()
    {
        return view('livewire.home-component');
    }
}
