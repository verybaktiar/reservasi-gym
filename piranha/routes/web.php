<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PembayaranController;

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

// Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
// Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
// Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
// Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
// Route::get('/', function () {
// 	return view('login');
// });
Route::get('/', 'App\Http\Controllers\PelangganController@index');
Route::get('service', 'App\Http\Controllers\PelangganController@service');
Route::get('loginn', 'App\Http\Controllers\AuthController@index')->name('loginn');
Route::get('register', 'App\Http\Controllers\AuthController@register');
Route::post('register', 'App\Http\Controllers\AuthController@registerSimpan')->name('register.simpan');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');


Route::group(['middleware' => ['auth']], function () {
	Route::group(['middleware' => ['cek_login:admin']], function () {
		Route::get('dashboard', 'App\Http\Controllers\DashboardController@index');
		Route::get('kategori', 'App\Http\Controllers\KategoriController@index');
		Route::get('kategori/tambah', 'App\Http\Controllers\KategoriController@tambah');
		Route::post('kategori/store', 'App\Http\Controllers\KategoriController@store');
		Route::get('kategori/edit/{id_kategori}', 'App\Http\Controllers\KategoriController@edit');
		Route::post('kategori/update/{id_kategori}', 'App\Http\Controllers\KategoriController@update')->name('kategori.update');
		Route::get('kategori/delete/{id_kategori}', 'App\Http\Controllers\KategoriController@delete');
		Route::get('paket', 'App\Http\Controllers\PaketController@index');
		Route::post('paket/store', 'App\Http\Controllers\PaketController@store');
		Route::get('paket/edit/{id_paket}', 'App\Http\Controllers\PaketController@edit');
		Route::post('paket/update/{id_paket}', 'App\Http\Controllers\PaketController@update')->name('paket.update');
		Route::get('paket/hapus/{id_paket}', 'App\Http\Controllers\PaketController@delete');
		Route::get('produk', 'App\Http\Controllers\ProdukController@index');
		Route::post('produk/store', 'App\Http\Controllers\ProdukController@store');
		Route::get('produk/edit/{id_produk}', 'App\Http\Controllers\ProdukController@edit');
		Route::post('produk/update/{id_produk}', 'App\Http\Controllers\ProdukController@update')->name('produk.update');
		Route::get('produk/hapus/{id_produk}', 'App\Http\Controllers\ProdukController@delete');
		Route::get('member', 'App\Http\Controllers\MemberController@index');
		Route::post('member/store', 'App\Http\Controllers\MemberController@store');
		Route::post('member/update/{id_member}', 'App\Http\Controllers\MemberController@update');
		Route::get('member/hapus/{id_member}', 'App\Http\Controllers\MemberController@delete');
		Route::get('reservasi', 'App\Http\Controllers\ReservasiController@index');
		Route::get('pengguna', 'App\Http\Controllers\PenggunaController@index');
		Route::post('pengguna/store', 'App\Http\Controllers\PenggunaController@store');
		Route::get('pengguna/edit/{id}', 'App\Http\Controllers\PenggunaController@edit');
		Route::post('pengguna/update/{id}', 'App\Http\Controllers\PenggunaController@update')->name('pengguna.update');
		Route::delete('pengguna/destroy/{id}', 'App\Http\Controllers\PenggunaController@delete');
		Route::get('saldo', 'App\Http\Controllers\SaldoController@index');
		Route::post('saldo/store', 'App\Http\Controllers\SaldoController@store');
		Route::get('saldo/edit/{id}', 'App\Http\Controllers\SaldoController@edit');
		Route::post('saldo/update/{id}', 'App\Http\Controllers\SaldoController@update')->name('saldo.update');
		Route::delete('saldo/destroy/{id}', 'App\Http\Controllers\SaldoController@delete');
	});





	Route::group(['middleware' => ['cek_login:user']], function () {
		//  Route::resource('editor', AdminController::class);


		Route::get('membership', 'App\Http\Controllers\PelangganController@membership');

		Route::post('reservasi/store', 'App\Http\Controllers\ReservasiController@store');
		Route::get('reservasi/detail/{id}', 'App\Http\Controllers\ReservasiController@detail')->name('reservasi.detail');
		Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
		Route::post('pembayaran', [PembayaranController::class, 'proses'])->name('pembayaran.proses');

	});
});
