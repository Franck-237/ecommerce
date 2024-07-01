<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\models\HomeSlide;
use Illuminate\Support\Facades\Storage;

class AdminHomeSlideComponent extends Component
{
    use WithFileUploads;

    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $status;
    public $image;
    public $link;

    public function addSlide() {
        $slide = new HomeSlide();
        $slide->top_title = $this->top_title;
        $slide->title = $this->title;
        $slide->sub_title = $this->sub_title;
        $slide->offer = $this->offer;
        $slide->status = $this->status;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('slider', $imageName);
        //$slide->image = storeAs('slider', $imageName);
        $slide->image = $imageName;
        $slide->link = $this->link;
        $slide->save();
        session()->flash('message', 'Nouvelle slide enregistrée!');
        $this->reset(['top_title', 'title', 'sub_title', 'offer', 'status', 'image', 'link']);
    }

    public function render()
    {
        return view('livewire.admin.admin-home-slide-component');
    }
}
