<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Livewire\HomeComponent;
use App\Livewire\ConditionsComponent;
use App\Livewire\PrivacyComponent;
use App\Livewire\AboutComponent;
use App\Livewire\ContactComponent;
use App\Livewire\ShopComponent;
use App\Livewire\CartComponent;
use App\Livewire\DetailsComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\CategoryComponent;
use App\Livewire\SearchComponent;
use App\Livewire\WishlistComponent;
use App\Livewire\AllAvisComponent;
use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\AdminProductComponent;
use App\Livewire\Admin\AdminAddProductComponent;
use App\Livewire\Admin\AdminEditProductComponent;
use App\Livewire\Admin\AddCategoriesComponent;
use App\Livewire\Admin\AdminCategoriesComponent;
use App\Livewire\Admin\AdminEditHomeSlideComponent;
use App\Livewire\Admin\AdminHomeSlideComponent;
use App\Livewire\Admin\AdminHomeSliderComponent;
use App\Livewire\Admin\AdminCouponComponent;
use App\Livewire\Admin\AdminAddCouponComponent;
use App\Livewire\Admin\AdminEditCategoryComponent;
use App\Livewire\Admin\AdminEditCouponComponent;
use App\Livewire\User\UserDashboardComponent;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', HomeComponent::class)->name('home.index');

Route::get('/shop', ShopComponent::class)->name('shop');
Route::get('/all-reviews', AllAvisComponent::class)->name('avis');
Route::get('/privacy', PrivacyComponent::class)->name('privacy');
Route::get('/terms-conditions', ConditionsComponent::class)->name('terms');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/contact', ContactComponent::class)->name('contact');
Route::get('/product-category/{slug}', CategoryComponent::class)->name('product.category');
Route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
Route::get('/cart', CartComponent::class)->name('shop.cart');
Route::get('/checkout', CheckoutComponent::class)->name('shop.checkout');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/wishlist', WishlistComponent::class)->name('shop.wishlist');


/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/admin/categories', AddCategoriesComponent::class)->name('admin.categories');
    Route::get('/admin/coupons', AdminCouponComponent::class)->name('admin.coupons');
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/category/add', AdminCategoriesComponent::class)->name('admin.category.add');
    Route::get('/admin/coupon/add', AdminAddCouponComponent::class)->name('admin.coupon.add');
    Route::get('/admin/slider', AdminHomeSliderComponent::class)->name('admin.home.slider');
    Route::get('/admin/slider/add', AdminHomeSlideComponent::class)->name('admin.home.slider.add');
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.product.add');
    Route::get('/admin/product/edit/{product_id}', AdminEditProductComponent::class)->name('admin.product.edit');
    Route::get('/admin/coupon/edit/{coupon_id}', AdminEditCouponComponent::class)->name('admin.coupon.edit');
    Route::get('/admin/slider/edit/{slide_id}', AdminEditHomeSlideComponent::class)->name('admin.home.slider.edit');
    Route::get('/admin/category/edit/{category_id}', AdminEditCategoryComponent::class)->name('admin.category.edit');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
