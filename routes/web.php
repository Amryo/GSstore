<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\WelcomeController;
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
Route::view('/', 'admin.index');
Route::get('/w', [WelcomeController::class, 'index']);

Route::get('/user', [WelcomeController::class, 'user']);

Route::get('/user/{name}', [WelcomeController::class, 'show']);

Route::any('any', 'WelcomeController@index');

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoriesController::class);
    Route::resource('products', ProductController::class);
    // Route::resource('user', [UserController::class]);

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
