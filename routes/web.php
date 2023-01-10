<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\profile;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\MainController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\RatingController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\payments\StripePaymentController;
use App\Http\Controllers\admin\RoleAndPermissionController;

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

// Login Auth
Auth::routes([
    'verify' => true
]);

// Google login
Route::get('login-google', [LoginController::class, 'redirectToProvider'])->name('login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleCallback']);

// Home Page 
Route::get('/', [HomeController::class, 'index']);
Route::get('/',[HomeController::class, 'featured_products'])->middleware('verified');
Route::get('product',[HomeController::class, 'quickView']);
Route::get('product/{prod_slug}',[HomeController::class, 'productView']);
Route::get('product-list',[HomeController::class, 'productlist']);
Route::post('searchproduct',[HomeController::class, 'searchproduct']);
Route::get('contact',[HomeController::class, 'contact']);
Route::get('faq',[HomeController::class, 'faq']);
// Products by Category
Route::get('cateProducts',[HomeController::class, 'category'])->name('category');
// Wishlist
Route::post('add-to-wishlist',[WishlistController::class, 'add']);
Route::post('update-wishlist',[WishlistController::class, 'updateWishlist']);
Route::post('delete-wishlist-item',[WishlistController::class, 'deleteitem']);
// Cart
Route::post('add-to-cart',[CartController::class, 'addProduct']);
Route::post('delete-cart-item',[CartController::class, 'deleteproduct']);
Route::post('update-cart',[CartController::class, 'updatecart']);


// Cart & Wishlist Count
Route::get('load-cart-count',[CartController::class, 'cartcount'])->name('cart-count');
Route::get('wishlist-count',[WishlistController::class, 'wishlistCount'])->name('wishlist-count');

// Front End
Route::get('profile',[profile::class, 'index'])->name('profile');
Route::middleware(['auth'])->group(function() {
    // Profile
    Route::get('edit/{id}',[profile::class, 'showedit'])->name('user-edit-profile');
    Route::put('edit/{id}',[profile::class, 'edit'])->name('user-profile');
    // Cart
    Route::get('proddetail',[CartController::class, 'index']);
    Route::get('cart',[CartController::class, 'viewCart']);

    // Checkout
    Route::get('checkout',[CheckoutController::class, 'index'])->name('cart.checkout');
    Route::post('place-order',[CheckoutController::class, 'placeOrder'])->name('place-order');
    
    // Order
    Route::get('order-detail',[OrderController::class, 'index'])->name('order-detail');
    Route::get('view-order/{id}',[OrderController::class, 'view'])->name('view-order');

    // Wishlist 
    Route::get('wishlist',[WishlistController::class, 'index']);
    
    // Rating
    Route::post('add-rating',[RatingController::class, 'rating'])->name('product-rating');

    // Stripe payment
    Route::post('payment',[StripePaymentController::class, 'checkout'])->name('checkout.credit-card');
    Route::post('stripe-payment',[StripePaymentController::class, 'insertStripeDataIntoDb'])->name('stript-insert');
});

// Back End 
 Route::middleware(['auth','isAdmin'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[AdminController::class, 'index']);
    });
    
    // *************************************User****************************************  //
    Route::prefix('admin/profile')->group(function(){
        Route::get('/',[ProfileController::class, 'index']);
        Route::get('edit/{id}',[ProfileController::class, 'showedit'])->name('show-edit-profile');
        Route::put('edit/{id}',[ProfileController::class, 'edit'])->name('edit-profile');

        // open Setting Route //
        // Route::get('open-setting',[ProfileController::class, 'openSetting'])->name('open-setting');
    });
    // ***********************************End User**************************************  //

    // *************************************User****************************************  //
    Route::prefix('admin/user')->group(function(){
        Route::get('/',[UserController::class, 'index']);
        Route::get('add',[UserController::class, 'add'])->name('admin.user.add');
        Route::post('store',[UserController::class, 'store'])->name('store-user');
        Route::get('get-user',[UserController::class, 'show'])->name('get.user');
        Route::get('edit/{id}',[UserController::class, 'showedit'])->name('show-edit-user');
        Route::put('edit/{id}',[UserController::class, 'edit'])->name('edit-user');
        Route::get('delete/{id}',[UserController::class, 'delete'])->name('delete-user');
    });
    // ***********************************End User**************************************  //

    // *************************************Category****************************************  //
    Route::prefix('admin/category')->group(function(){
        Route::get('/',[CategoryController::class, 'index']);
        Route::get('get-category',[CategoryController::class, 'show'])->name('get.category');
        Route::get('add',[CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('add',[CategoryController::class, 'store'])->name('add-category');
        Route::get('edit/{id}',[CategoryController::class, 'showedit'])->name('show-edit-category');
        Route::put('edit/{id}',[CategoryController::class, 'edit'])->name('edit-category');
        Route::get('delete/{id}',[CategoryController::class, 'delete'])->name('delete-category');

        // Data Import and Export //
        Route::get('export-category',[CategoryController::class, 'exportCategory'])->name('export-category');
        Route::get('add-Category',[CategoryController::class, 'getImportCategory'])->name('get-import-category');
        Route::post('import-category',[CategoryController::class, 'importCategory'])->name('import-category');
    });
    // ***********************************End Category**************************************  //

    // *************************************Product*****************************************  //
    Route::prefix('admin/product')->group(function(){
        Route::get('/',[ProductController::class, 'index']);
        Route::get('get',[ProductController::class, 'show'])->name('get.product');
        Route::get('add',[ProductController::class, 'add'])->name('admin.product.add');
        Route::post('store',[ProductController::class, 'store'])->name('store-product');
        Route::get('edit/{id}',[ProductController::class, 'showedit'])->name('show-edit-product');
        Route::put('edit/{id}',[ProductController::class, 'edit'])->name('edit-product');
        Route::get('delete/{id}',[ProductController::class, 'delete'])->name('delete-product');
    });
    // ***********************************End Product***************************************  //

    // *************************************Role*****************************************  //
    Route::prefix('admin/role')->group(function(){
        Route::get('/',[RoleAndPermissionController::class, 'index']);
        Route::get('get',[RoleAndPermissionController::class, 'getAllRoles'])->name('get.role');
        Route::get('permissions',[RoleAndPermissionController::class, 'assignPermission'])->name('get-permissions');
        Route::post('store-Permission',[RoleAndPermissionController::class, 'storePermission'])->name('store-permission');
        Route::post('store-Role',[RoleAndPermissionController::class, 'storeRole'])->name('store-role');
        Route::get('permission/{id}',[RoleAndPermissionController::class, 'getAllPermissions'])->name('get-permissions');
        Route::post('assign-permission',[RoleAndPermissionController::class, 'assignPermissions'])->name('assign-permissions');
    });
    // ***********************************End Role***************************************  //
    
    // *************************************Order*****************************************  //
    Route::prefix('admin/order')->group(function(){
        Route::get('/',[OrdersController::class, 'index'])->name('admin.order');
        Route::get('view-order/{id}',[OrdersController::class, 'view'])->name('admin.order-view');
        Route::put('update-order/{id}',[OrdersController::class, 'update'])->name('update-order');
        Route::get('order-history',[OrdersController::class, 'orderhistory'])->name('order-history');
    });
    // ***********************************End Order***************************************  //
 });
 