<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminAddCouponComponent extends Component
{
    public $code;

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component');
    }

    public function storeCoupon() {
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->save();
        session()->flash('message', 'Coupon crée avec succès');
    }
}
