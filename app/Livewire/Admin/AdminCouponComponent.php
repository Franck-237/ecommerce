<?php

namespace App\Livewire\Admin;

use App\Models\Coupon;

use Livewire\Component;

class AdminCouponComponent extends Component
{
    public $coupon_id;

    public function render()
    {
        $coupons = Coupon::orderBy('code', 'ASC')->paginate(10);
        return view('livewire.admin.admin-coupon-component', compact('coupons'));
    }

    public function destroy(string $id ) {
        Coupon::destroy($id);
        session()->flash('message', 'Coupon supprimé avec succès');
    }
}
