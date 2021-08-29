<?php

use App\Http\Controllers\Admin\WisudaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

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

// Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
// Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('general.dashboard')->middleware('role:superadmin|admin|mahasiswa');


//testing components template
Route::get('/master', function () {
    return view('master');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role:superadmin')->group(function () {
    // superadmin
    Route::get('/superadmin/tahunajaran', [PeriodeController::class, 'tahunajaran'])->name('superadmin.tahunajaran');
    Route::post('/superadmin/tahunajaranpost', [PeriodeController::class, 'tahunajaranpost'])->name('superadmin.tahunajaranpost');
    Route::get('/superadmin/periode', [PeriodeController::class, 'periode'])->name('superadmin.periode');
    Route::post('/superadmin/periodepost', [PeriodeController::class, 'periodepost'])->name('superadmin.periodepost');
    Route::get('/superadmin/periodic', [PeriodeController::class, 'index'])->name('superadmin.periodic');
    Route::get('/superadmin/periodic/add', [PeriodeController::class, 'addperiodic'])->name('superadmin.addperiodic');
    Route::post('/superadmin/periodic/add', [PeriodeController::class, 'addperiodicpost'])->name('superadmin.addperiodicpost');
});

Route::middleware('role:admin')->group(function () {
    // admin
    Route::get('/admin/verification', [WisudaController::class, 'index']);
    Route::get('/admin/verification/detail/{nim}', [WisudaController::class, 'detail']);
    Route::post('/admin/verification/{berkas}', [WisudaController::class, 'verifikasidokumen'])->name('admin.verifikasidokumen');
    Route::get('/admin/verified', [WisudaController::class, 'dokumenverified'])->name('admin.dokumenverified');
    Route::get('/admin/kelengkapan', [WisudaController::class, 'kelengkapan'])->name('admin.kelengkapan');
    Route::post('/admin/kelengkapan/{wisuda}', [WisudaController::class, 'pengambilan'])->name('admin.pengambilan');
    Route::get('/admin/return', [WisudaController::class, 'pengembalian'])->name('admin.pengembalian');
    Route::put('/admin/return/{pengembalian}', [WisudaController::class, 'accpengembalian'])->name('admin.accpengembalian');
});

Route::middleware('role:mahasiswa')->group(function () {
    // mahasiswa
    Route::get('/students/register', [RegisterController::class, 'index']);
    Route::post('/students/register', [RegisterController::class, 'store']);
    Route::get('/students/register', [RegisterController::class, 'index'])->name('students.register');
    Route::get('/students/file-upload', [RegisterController::class, 'berkas'])->name('students.file-upload');
    Route::post('/students/file-upload', [RegisterController::class, 'uploadberkas']);
    Route::put('/students/file-upload/{berkas}', [RegisterController::class, 'revisiberkas'])->name('revisi.berkas');
    Route::get('/students/pengambilan', [RegisterController::class, 'pengambilan'])->name('pengambilan');
    Route::get('/students/pengembalian', [WisudaController::class, 'pengembalianAttr'])->name('pengembalian');
});

Route::get('/admin/archive', [WisudaController::class, 'archive'])->name('admin.archive')->middleware('role:superadmin|admin');
Route::get('/admin/archivedetail/{mahasiswa_id}', [WisudaController::class, 'archivedetail'])->name('admin.archive-detail')->middleware('role:superadmin|admin');
