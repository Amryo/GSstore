<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserPermessionsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\CheckUserType;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';



// Testing Code 


Route::get(
  '/',
  function () {
    return redirect()->route('home');
  }
);




/** Admin Prefix Routes */
Route::prefix('admin')->domain('admin.localhost')->middleware(['auth', CheckUserType::class])->group(function () {
  Route::view('/', 'admin.index');
  Route::resource('categories', CategoriesController::class);
  Route::post('delete_all-categories', [CategoriesController::class, 'DeleteAllSelectedCategory'])->name('delete_all');

  Route::resource('products', ProductController::class);
  Route::resource('orders', OrderController::class);

  Route::resource('roles', RoleController::class);
  Route::get('/usersPer', [UserPermessionsController::class, 'index'])->name('user.index');
  Route::get('/usersPer/{id}', [UserPermessionsController::class, 'create'])->name('user.create');
  Route::post('/usersPer/{id}', [UserPermessionsController::class, 'store'])->name('user.store');

  Route::get('/chat', [MessagesController::class, 'index'])->name('chat.view');
  Route::post('/chat', [MessagesController::class, 'store'])->name('chat.store');


  //User Profile 
  Route::get('/user-profile', [UserProfileController::class, 'index'])->name('profile.view');
});

/** Website Prefix Routes */
Route::prefix('v1')->group(function () {
  Route::get('/', [FrontEndController::class, 'index'])->name('home');
  Route::get('/products', [FrontEndController::class, 'products'])->name('products');
  Route::post('/filter-products', [FrontEndController::class, 'filterProducts'])->name('Filter_Products');

  Route::get('/productDetails/{slug}', [FrontEndController::class, 'productDetails'])->name('productD');
  // Route::get('/cart', [FrontEndController::class, 'cart'])->name('viewCart');
  Route::get('/order',   [CheckoutController::class, 'index'])->name('checkoutView');
  Route::post('/order', [CheckoutController::class, 'store'])->name('checkout');
  Route::post('/cart', [CartController::class, 'store'])->name('cart');
  Route::get('/cart', [CartController::class, 'index'])->name('viewCart');
  Route::post('delete_all-products-from-cart', [CartController::class, 'DeleteAllSelectedProducts'])->name('delete_all_products_from_cart');

  Route::post('updateQuantity', [CartController::class, 'updateQuantity'])->name('updateQuantity');

  Route::delete('cart/product/{id}', [CartController::class, 'destroy'])->name('removeProduct');
  Route::get('orders', function () {
    return Order::all();
  })->name('orders');
});


  //HTTP request 
  //Route::get();
  //Rotue::post();
  //Route::patch();
  //Route::put();
  //Route::options(); 
  //Route::delete();

//Other Helper Method
//Route::view();
//Rotue::redirect();
//Route::resource();
//Route::apiResource();
//Route::group();
