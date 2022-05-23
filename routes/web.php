<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HowController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/bestSeller', [ProdukController::class, 'bestSeller'])->name('bestSeller');
Route::get('/detail', [ProdukController::class, 'detail'])->name('detail');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::post('/kirim', [KontakController::class, 'kirim'])->name('kirim');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/tabelProduk', [ProdukController::class, 'tabelProduk'])->name('tabelProduk');
Route::get('/aksiSearch', [ProdukController::class, 'aksiSearch'])->name('aksiSearch');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/aksiLogin', [LoginController::class, 'aksiLogin'])->name('aksiLogin');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/aksiRegister', [LoginController::class, 'aksiRegister'])->name('aksiRegister');
Route::get('/userPage', [LoginController::class, 'userPage'])->name('userPage')->middleware('auth');
Route::get('/orderHistory', [LoginController::class, 'orderHistory'])->name('orderHistory')->middleware('auth');
Route::post('/editUser', [LoginController::class, 'editUser'])->name('editUser')->middleware('auth');
Route::get('/goggleRedirect', [LoginController::class, 'redirectToProvider'])->name('goggleRedirect');
Route::get('/callback', [LoginController::class, 'callback'])->name('callback');


// mail
Route::get('/verify', [function(){
    return view('login.verify', ['title' => 'verify']);
}])->name('verify');

Route::get('/shopingCart', [OrderController::class, 'shopingCart'])->name('shopingCart');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/totalCheckout', [OrderController::class, 'totalCheckout'])->name('totalCheckout');
Route::get('/checkout2', [OrderController::class, 'checkout2'])->name('checkout2');
Route::get('/getKota', [OrderController::class, 'getKota'])->name('getKota');
Route::get('/getIconCart', [OrderController::class, 'getIconCart'])->name('getIconCart');
Route::get('/totalCart', [ProdukController::class, 'totalCart'])->name('totalCart');
Route::get('/tambahCart', [ProdukController::class, 'tambahCart'])->name('tambahCart');
Route::get('/kurangCart', [ProdukController::class, 'kurangCart'])->name('kurangCart');
Route::post('/aksiCheckout', [OrderController::class, 'aksiCheckout'])->name('aksiCheckout');
Route::post('/aksiCart', [OrderController::class, 'aksiCart'])->name('aksiCart');
Route::get('/plus_cart', [OrderController::class, 'plus_cart'])->name('plus_cart');
Route::get('/min_cart', [OrderController::class, 'min_cart'])->name('min_cart');
Route::get('/infoCart', [OrderController::class, 'infoCart'])->name('infoCart');
Route::get('/cart', [OrderController::class, 'cartList'])->name('cartList');
Route::get('/viewCart', [OrderController::class, 'viewCart'])->name('viewCart');
Route::get('/remove', [OrderController::class, 'remove'])->name('remove');
Route::get('/addToCart', [OrderController::class, 'addToCart'])->name('addToCart');
Route::post('/updateCart', [OrderController::class, 'updateCart'])->name('updateAdd');
Route::post('/remove', [OrderController::class, 'removeCart'])->name('removeCart');
Route::post('/clear', [OrderController::class, 'clearAllCart'])->name('cartClear');
Route::get('/voucherPembayaran', [OrderController::class, 'voucherPembayaran'])->name('voucherPembayaran');
Route::get('/pembayaran', [OrderController::class, 'pembayaran'])->name('pembayaran');


Route::get('/confirm', [ConfirmController::class, 'index'])->name('confirm');
Route::get('/how', [HowController::class, 'index'])->name('how');









