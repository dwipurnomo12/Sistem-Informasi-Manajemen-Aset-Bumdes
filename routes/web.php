<?php


use App\Models\Lokasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PenghapusanAsetController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\StatusPengadaanController;
use App\Http\Controllers\ResetPasswordController;



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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [GrafikController::class, 'index']);

Route::resource('/barang', BarangController::class);
Route::resource('/kategori', KategoriController::class);
Route::resource('/lokasi', LokasiController::class);
Route::resource('/satuan', SatuanController::class);

Route::resource('/laporan', LaporanController::class);
Route::get('cetak', [LaporanController::class, 'cetak'])->name('cetak');
Route::get('/statistik', [StatistikController::class, 'index']);
Route::get('/label', [LabelController::class, 'index']);
Route::get('/keuangan/laporan-keuangan', [KeuanganController::class, 'cetakLaporanKeuangan']);
Route::resource('/keuangan', KeuanganController::class);

Route::resource('/penghapusan-aset', PenghapusanAsetController::class);
Route::PUT('/penghapusan-aset/restore/{id}', [PenghapusanAsetController::class, 'restore']);

Route::get('/reset-password', [ResetPasswordController::class, 'index']);
Route::put('/reset-password', [ResetPasswordController::class, 'resetPassword']);
Route::get('barang/label/{id}', [BarangController::class, 'cetakLabel']);

Route::middleware(['auth', 'checkRole:direktur,sekretaris'])->group(function(){
    Route::resource('/permintaan', StatusPengadaanController::class);
});

Route::group(['middleware' => ['auth', 'direktur']], function(){
    Route::put('/permintaan/{id}/setuju', [StatusPengadaanController::class, 'setPersetujuan'])->name('permintaan.setuju');
    Route::put('/permintaan/{id}/tolak', [StatusPengadaanController::class, 'setPenolakan'])->name('permintaan.tolak');
});

Route::group(['middleware' => ['auth', 'sekretaris']], function(){
    Route::resource('/datauser', DataUserController::class);
    Route::get('permintaan/laporan-pengadaan/{id}', [StatusPengadaanController::class, 'cetakPengadaanBarang']);
});

Route::group(['middleware' => ['auth', 'kepalausaha']], function(){
    Route::resource('/pengadaan', PengadaanController::class);
});









