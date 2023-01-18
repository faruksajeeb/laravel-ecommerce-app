<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\lib\Webspice;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;

use App\Http\Livewire\Backend\OptionGroup;
use App\Http\Livewire\Backend\Options;
use App\Http\Livewire\Backend\CategoryComponent;
use App\Http\Livewire\Backend\SubcategoryComponent;
use App\Http\Livewire\Backend\CustomerComponent;
use App\Http\Livewire\Backend\CouponComponent;
use App\Http\Livewire\Backend\ProductComponent;
use App\Http\Livewire\Backend\AdminSliderComponent;
use App\Http\Livewire\Backend\OrderComponent;

use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\Shop;
use App\Http\Livewire\Frontend\ProductDetails;
use App\Http\Livewire\Frontend\ShoppingCart;
use App\Http\Livewire\Frontend\Checkout;
use App\Http\Livewire\Frontend\CustomerLogin;
use App\Http\Livewire\Frontend\CustomerRegister;
use App\Http\Livewire\Frontend\About;
use App\Http\Livewire\Frontend\Contact;
use App\Http\Livewire\Frontend\SearchComponent;
use App\Http\Livewire\Frontend\WishlistComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',Home::class)->name('/'); 
Route::get('/about',About::class)->name('about'); 
Route::get('/contact',Contact::class)->name('contact'); 
Route::get('/shop',Shop::class)->name('shop'); 
// Route::get('/shop/{categoryId}',Shop::class)->name('shop'); 
Route::get('/product-details/{productId}',ProductDetails::class)->name('product-details'); 
Route::get('/cart',ShoppingCart::class)->name('cart'); 
Route::get('/wishlist',WishlistComponent::class)->name('wishlist'); 


Route::get('/customer-login',CustomerLogin::class)->name('customer-login'); 
Route::get('/customer-register',CustomerRegister::class)->name('customer-register'); 
Route::get('/search',SearchComponent::class)->name('product-search'); 

Route::group(['middleware' => ['auth:customer']], function() {
    Route::get('/checkout',Checkout::class)->name('checkout');
    // Route::get('/customer-logout',CustomerLogout::class)->name('customer-logout');
});
Route::middleware('auth')->group(function () {
    Route::get('active-inactive', [Webspice::class, 'activeInactive'])->name('active.inactive');
    Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::any('change-password',[UserController::class,'changePassword'])->name('change-password');
    Route::get('user-profile',[UserController::class,'userProfile'])->name('user-profile');
        
    // Route::resource('roles', RoleController::class);
    Route::group(['middleware' => ['role:superadmin|developer']], function () { //user & role only created by superadmin
        Route::resources([
            'roles' => RoleController::class,
            'users' => UserController::class
        ]);
        Route::match(['get', 'put'],'company-setting',[SettingController::class,'companySetting'])->name('company-setting');
        Route::match(['get', 'put'],'basic-setting',[SettingController::class,'basicSetting'])->name('basic-setting');
        Route::match(['get', 'put'],'theme-setting',[SettingController::class,'themeSetting'])->name('theme-setting');
        Route::match(['get', 'put'],'email-setting',[SettingController::class,'emailSetting'])->name('email-setting');
        Route::match(['get', 'put'],'performance-setting',[SettingController::class,'performanceSetting'])->name('performance-setting');
        Route::match(['get', 'put'],'approval-setting',[SettingController::class,'approvalSetting'])->name('approval-setting');
        Route::match(['get', 'put'],'invoice-setting',[SettingController::class,'invoiceSetting'])->name('invoice-setting');
        Route::match(['get', 'put'],'salary-setting',[SettingController::class,'salarySetting'])->name('salary-setting');
        Route::match(['get', 'put'],'notification-setting',[SettingController::class,'notificationSetting'])->name('notification-setting');
        Route::match(['get', 'put'],'toxbox-setting',[SettingController::class,'toxboxSetting'])->name('toxbox-setting');
        Route::match(['get', 'put'],'cron-setting',[SettingController::class,'cronSetting'])->name('cron-setting');
    }); 
    
    Route::get('option-groups',OptionGroup::class)->name('option-groups'); 
    Route::get('options',Options::class)->name('options'); 
    Route::get('categories',CategoryComponent::class)->name('categories'); 
    Route::get('subcategories',SubcategoryComponent::class)->name('subcategories'); 
    Route::get('customers',CustomerComponent::class)->name('customers'); 
    Route::get('coupons',CouponComponent::class)->name('coupons'); 
    Route::get('products',ProductComponent::class)->name('products'); 
    Route::get('sliders',AdminSliderComponent::class)->name('sliders'); 
    Route::get('coupons',CouponComponent::class)->name('coupons'); 
    Route::get('orders',OrderComponent::class)->name('orders'); 
    
    Route::get('clear-permission-cache',[RoleController::class,'clearPermissionCache'])->name('clear-permission-cache');
});
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
   
    return back()->with("success", 'Cleared all.');
});


require __DIR__.'/auth.php';
