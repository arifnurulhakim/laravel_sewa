<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KeranjangController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

Auth::routes();

// User
Route::resource('users', UserController::class);
Route::middleware('auth')->group(function () {

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    
        // Admin - Pemesanan

    Route::resource('pemesanan/', PemesananController::class);
    Route::get('pemesanan/{kode_pemesanan}', [PemesananController::class, 'show'])->name('pemesanan.show');
    // Route::get('pemesanan/{kode_pemesanan}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
    // Route::put('pemesanan/{kode_pemesanan}', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::delete('/pemesanan/{kode_pemesanan}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');
    Route::get('KonfirmasiPesanan', [PemesananController::class, 'indexConfirm'])->name('pemesanan.indexConfirm');
    Route::get('KonfirmasiPengembalian', [PemesananController::class, 'indexPengembalian'])->name('pemesanan.indexPengembalian');
    Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('pemesanan/{kode_pemesanan}/pengembalian', [PemesananController::class, 'pengembalian'])->name('pemesanan.pengembalian');
    Route::get('pemesanan/pengembalian/{kode_pemesanan}', [PemesananController::class, 'pengembalian'])->name('pemesanan.pengembalian');
    Route::post('pemesanan/updatePengembalian/{kode_pemesanan}', [PemesananController::class, 'updatePengembalian'])->name('pemesanan.updatePengembalian');
    Route::get('pemesanan/{kode_pemesanan}/confirm', [PemesananController::class, 'confirm'])->name('pemesanan.confirm');
    Route::get('pemesanan/{kode_pemesanan}/sewakan', [PemesananController::class, 'sewakan'])->name('pemesanan.sewakan');
    Route::get('pemesanan/{kode_pemesanan}/selesai', [PemesananController::class, 'selesai'])->name('pemesanan.selesai');

    Route::get('pemesanan/printpenyewaan/{kode_pemesanan}', [PemesananController::class, 'printpenyewaan'])->name('pemesanan.printpenyewaan');

    Route::get('pemesanan/printpengembalian/{kode_pemesanan}', [PemesananController::class, 'printpengembalian'])->name('pemesanan.printpengembalian');

        // Admin - Barang
    Route::resource('jenisBarang', JenisBarangController::class);
    Route::resource('barang', BarangController::class);
    // ... other admin routes
});

// User routes
Route::middleware(['auth', 'role:user,admin'])->group(function () {

        Route::get('pemesananUsers', [PemesananController::class, 'indexUser'])->name('pemesanan.indexUser');
        Route::get('etalase', [BarangController::class, 'etalase']);
       // Menampilkan halaman keranjang
       Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');

       // Menambahkan item ke keranjang
       Route::get('/keranjang/createPenyewaan', [KeranjangController::class, 'createPenyewaan'])->name('keranjang.createPenyewaan');
       Route::post('/keranjang/createPembelian', [KeranjangController::class, 'createPembelian'])->name('keranjang.createPembelian');
       Route::post('/keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
       
       // Menampilkan detail item keranjang
       Route::get('/keranjang/{id}', [KeranjangController::class, 'show'])->name('keranjang.show');
       
       // Mengupdate item keranjang
       Route::put('/keranjang/{id}', [KeranjangController::class, 'update'])->name('keranjang.update');
       
       // Menghapus item keranjang
       Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
       



});
});
