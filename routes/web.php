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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('general.login');
// });

Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('general.dashboard', ['title' => 'Dashboard']);
});

//students routing
Route::get('/students/register', [RegisterController::class, 'index']);
Route::post('/students/register', [RegisterController::class, 'store']);

// Route::get('/students/file-upload', function () {
//     return view('students.file-upload', ['title' => 'Unggah Berkas Wisuda']);
// });
Route::get('/students/file-upload', [RegisterController::class, 'berkas']);
Route::post('/students/file-upload', [RegisterController::class, 'uploadberkas']);
Route::put('/students/file-upload/{berkas}', [RegisterController::class, 'revisiberkas'])->name('revisi.berkas');
Route::get('/students/pengambilan', [RegisterController::class, 'pengambilan'])->name('pengambilan');

Route::get('/students/pengembalian', function () {
    return view('students.pengembalian', ['title' => 'Pengembalian Kelengkapan Wisuda']);
});


//administration routing
Route::get('/admin/verification', [WisudaController::class, 'index']);
Route::get('/admin/verification/detail/{nim}', [WisudaController::class, 'detail']);
Route::post('/admin/verification/{berkas}', [WisudaController::class, 'verifikasidokumen'])->name('admin.verifikasidokumen');
Route::get('/admin/verified', [WisudaController::class, 'dokumenverified'])->name('admin.dokumenverified');
Route::get('/admin/kelengkapan', [WisudaController::class, 'kelengkapan'])->name('admin.kelengkapan');
Route::post('/admin/kelengkapan/{wisuda}', [WisudaController::class, 'pengambilan'])->name('admin.pengambilan');
Route::get('/admin/return', [WisudaController::class, 'pengembalian'])->name('admin.pengembalian');


//superadmin routing
Route::get('/superadmin/periodic', [PeriodeController::class, 'index'])->name('superadmin.periodic');
Route::get('/superadmin/periodic/add', [PeriodeController::class, 'addperiodic'])->name('superadmin.addperiodic');
Route::post('/superadmin/periodic/add', [PeriodeController::class, 'addperiodicpost'])->name('superadmin.addperiodicpost');


// Route::get('/admin/pending', function () {
//     return view('admin.pending-verification', ['title' => 'Verifikasi Berkas Wisuda : Pending']);
// });

// Route::get('/admin/verified', function () {
//     return view('admin.verified', ['title' => 'Verifikasi Berkas Wisuda : Verified']);
// });
// Route::get('/admin/detail', function () {
//     return view('admin.detail', ['title' => 'Detail Berkas Wisuda : Nama Mahasiswa']);
// });

// Route::get('/admin/kelengkapan', function () {
//     return view('admin.kelengkapan', ['title' => 'Kelengkapan Peserta Wisuda']);
// });

// Route::get('/admin/return', function () {
//     return view('admin.return', ['title' => 'Pengembalian Kelengkapan Peserta Wisuda']);
// });

Route::get('/admin/archive', function () {
    return view('admin.archive', ['title' => 'Arsip Peserta Wisuda']);
});


//superadmin routing
// Route::get('/periodic', function () {
//     return view('superadmin.periodic', ['title' => 'Set Periode Wisuda']);
// });

// Route::get('/periodic/add', [PeriodeController::class, 'index']);
// Route::post('/periodic/add', [PeriodeController::class, 'addPeriode']);

// Route::get('/periodic/add', function () {
//     return view('superadmin.add-periodic', ['title' => 'Set Periode Wisuda']);
// });


//testing components template
Route::get('/master', function () {
    return view('master');
});

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
