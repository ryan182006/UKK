<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DaftarAlamatController;
use App\Http\Controllers\KeranjangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PesananController;
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


Route::get('/', [MainController::class, 'guest']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/prosesLogin', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('createRegister');

// Route::get('/beranda',[MainController] 

// admin
Route::group(['middleware' => ['auth', 'ChekRole:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('barang', BarangController::class);
    Route::get('/barang', [BarangController::class, 'search'])->name('cari');
    Route::resource('user', UserController::class);
    Route::get('/pesanan-admin/belum-dibayar', [PesananController::class, 'belumDibayar']);
    Route::get('/pesanan-admin/menunggu-konfirmasi', [PesananController::class, 'menungguKonfirmasi']);
    Route::get('/pesanan-admin/diproses', [PesananController::class, 'diproses']);
    Route::get('/pesanan-admin/dikirim', [PesananController::class, 'dikirim']);
    Route::get('/pesanan-admin/selesai', [PesananController::class, 'selesai']);
    Route::get('/pesanan-admin/dibatalkan', [PesananController::class, 'dibatalkan']);
    Route::get('/pesanan/admin/{checkout:id}', [PesananController::class, 'detailPesananAdmin']);
    Route::get('/cetak-pdf', [PenjualanController::class, 'cetakPdf']);
});

Route::post('/changeStatus/{checkout:id}', [PesananController::class, 'changeStatus'])->middleware('auth');

// user
Route::group(['middleware' => ['auth', 'ChekRole:user']], function () {
    Route::get('/home', [MainController::class, 'index'])->name('home');
    Route::get('/shop', [MainController::class, 'toko'])->name('shop');
    Route::resource('cart', KeranjangController::class);
    Route::post('cart/{barang:id}', [KeranjangController::class, 'addToCart']);
    Route::delete('cart/cart/{keranjang:id}', [KeranjangController::class, 'destroy']);
    Route::post('cart/cart/{keranjang:id}', [KeranjangController::class, 'updateCart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::resource('/daftar-alamat', DaftarAlamatController::class);
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.charger');
    Route::post('checkout/cek_ongkir', [OngkirController::class, 'cost']);
    Route::post('pembayaran', [CheckoutController::class, 'pembayaran']);
    Route::get('pesanan', [PesananController::class, 'index']);
    Route::get('/pesanan/{checkout:id}', [PesananController::class, 'detailPesanan']);
    Route::get('/pesanan/panding', [CheckoutController::class, 'create']);
});


// Route::get('/register', function () {
//     return view('login/register');
// })->name('register');
