<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminEditCouponComponent extends Component
{
    public $coupon_id;
    public $code;

    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component');
    }

    public function mount($coupon_id) {
        $coupon = Coupon::find($coupon_id);
        $this->coupon_id = $coupon->id;
        $this->code = $coupon->code;
    }

    public function updateCoupon() {
        $coupon = Coupon::find($this->coupon_id);
        $coupon->code = $this->code;
        $coupon->save();
        session()->flash('message', 'Le coupon a été modifié avec succès');
    }
}
