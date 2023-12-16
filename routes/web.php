<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[MainController::class,'guest']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/prosesLogin', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('createRegister');

// Route::get('/beranda',[MainController] 


Route::group(['middleware'=>['auth','ChekRole:admin']],function(){
    Route::get('/admin',[AdminController::class,'index']);
    Route::resource('barang', BarangController::class);
    Route::resource('user',UserController::class);
});


Route::group(['middleware'=>['auth','ChekRole:user']],function(){
    Route::get('/beranda',[MainController::class,'index'])->name('beranda');
    Route::resource('cart',KeranjangController::class);
    Route::post('cart/{barang:id}',[KeranjangController::class,'addToCart']);
    Route::delete('cart/cart/{keranjang:id}',[KeranjangController::class,'destroy']);
    Route::post('cart/cart/{keranjang:id}',[KeranjangController::class,'updateCart']);

});


// Route::get('/register', function () {
//     return view('login/register');
// })->name('register');

