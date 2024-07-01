<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\models\HomeSlide;
use Illuminate\Support\Facades\Storage;

class AdminEditHomeSlideComponent extends Component
{
    use WithFileUploads;

    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $status;
    public $image;
    public $link;
    public $slide_id;
    public $newimage;

    public function mount($slide_id) {
        $slide = HomeSlide::find($slide_id);
        $this->top_title = $slide->top_title;
        $this->title = $slide->title;
        $this->sub_title = $slide->sub_title;
        $this->offer = $slide->offer;
        $this->link = $slide->link;
        $this->status = $slide->status;
        $this->image = $slide->image;
        $this->slide_id = $slide->id;
    }

    public function updateSlide() {
        $slide = HomeSlide::find($this->slide_id);
        $slide->top_title = $this->top_title;
        $slide->title = $this->title;
        $slide->sub_title = $this->sub_title;
        $slide->offer = $this->offer;
        $slide->status = $this->status;
        /*if($this->newimage){
            unlink('assets/imgs/slider/'.$this->image);
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            Storage::putFileAs('slider', $this->newimage, $imageName);
            //$slide->newimage = storeAs('slider', $imageName);
            $slide->image = $imageName;
        }*/
        $slide->image = $this->image;
        $slide->link = $this->link;
        $slide->save();
        session()->flash('message', 'Slide mis à jour!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-home-slide-component');
    }
}
