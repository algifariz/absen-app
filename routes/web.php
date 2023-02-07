<?php

use Illuminate\Support\Facades\Route;
use App\Models\Guru as ModelsGuru;
use App\Models\Tingkatan as ModelsTingkatan;

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

// redirect / to /login
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('pages.dashboard', ['type_menu' => 'dashboard']);
})->middleware(['auth'])->name('dashboard');


Route::get('/rekap-absen', function () {
    return view('pages.rekap-absen', [
        'title' => 'Rekap Absen',
        'type_menu' => 'rekap'
    ]);
});

Route::get('/status-guru', [App\Http\Controllers\PresensiController::class, 'index'])->middleware('auth');

Route::get('/data-tingkatan', [App\Http\Controllers\TingkatanController::class, 'index'])->middleware(['auth']);

Route::get('/scan', function () {
    return view('pages.scan', [
        'type_menu' => 'scan qr',
        'title' => 'Scan Qr Code',
        'name' => 'Scan Qr Code',
    ]);
})->middleware(['auth']);

// Guru
Route::get('/data-guru', [App\Http\Controllers\GuruController::class, 'index'])->middleware('auth')->name('data-guru');
Route::get('/tambah-data', [App\Http\Controllers\GuruController::class, 'tambah'])->middleware(['auth']);
Route::post('/guru/simpan_guru', [App\Http\Controllers\GuruController::class, 'simpan_guru'])->middleware(['auth']);
Route::get('/detail-guru/{id}', [App\Http\Controllers\GuruController::class, 'detail'])->middleware(['auth']);
Route::get('/edit-data/{id}', [App\Http\Controllers\GuruController::class, 'edit'])->middleware(['auth']);
Route::put('/updateGuru/{id}', [App\Http\Controllers\GuruController::class, 'update'])->name('updateGuru')->middleware(['auth']);
Route::delete('/hapusGuru/{id}', [App\Http\Controllers\GuruController::class, 'destroy'])->middleware(['auth']);

// Jabatan
Route::get('/data-jabatan', [App\Http\Controllers\JabatanController::class, 'index'])->middleware(['auth']);
Route::get('/edit-jabatan/{id}', [App\Http\Controllers\JabatanController::class, 'edit'])->middleware(['auth']);
Route::put('/update-jabatan/{id}', [App\Http\Controllers\JabatanController::class, 'update'])->middleware(['auth']);


// Tunjangan
Route::get('/data-tunjangan', [App\Http\Controllers\JenisTunjangan::class, 'index'])->middleware(['auth']);
Route::get('/edit-tunjangan/{id}', [App\Http\Controllers\JenisTunjangan::class, 'edit'])->middleware(['auth']);
Route::put('/update-tunjangan/{id}', [App\Http\Controllers\JenisTunjangan::class, 'update'])->middleware(['auth']);

//jam mengajar
Route::get('/data-jam-mengajar', [App\Http\Controllers\JamMengajarController::class, 'index'])->middleware(['auth']);
Route::get('/tambah-data-jam-mengajar', [App\Http\Controllers\JamMengajarController::class, 'tambah'])->middleware(['auth']);
Route::post('/simpan_jam_mengajar', [App\Http\Controllers\JamMengajarController::class, 'simpan_jam_mengajar'])->middleware(['auth']);
Route::get('/edit-data-jam-mengajar/{id}', [App\Http\Controllers\JamMengajarController::class, 'edit'])->middleware(['auth']);
Route::put('/update-jam-mengajar/{id}', [App\Http\Controllers\JamMengajarController::class, 'update'])->name('updateJamMengajar')->middleware(['auth']);
Route::delete('/hapusJamMengajar/{id}', [App\Http\Controllers\JamMengajarController::class, 'destroy'])->middleware(['auth']);



// Generate QR Code
Route::get('/generate-qr-code', [App\Http\Controllers\QrController::class, 'index'])->name('generate-qr-code')->middleware(['auth']);
Route::post('/generate-qr-code-guru', [App\Http\Controllers\QrController::class, 'generate_qr_code_guru'])->middleware(['auth']);

// Register
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index']);
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);

// Login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);

// Logout
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

//scan
Route::get('/scan', [App\Http\Controllers\ScanController::class, 'index'])->middleware(['auth']);
Route::post('/validasi', [App\Http\Controllers\ScanController::class, 'validasi'])->name('validasi')->middleware(['auth']);

//laporan gajih
Route::get('/laporan-gajih', function () {
    return view('pages.laporan-gajih', [
        'type_menu' => 'laporan gajih',
        'title' => 'Laporan Gajih',
        'name' => 'Laporan Gajih',
    ]);
});

//slip gajih
Route::get('/slip-gajih', function () {
    return view('pages.slip-gajih', [
        'type_menu' => 'slip-gajih',
        'title' => 'Slip Gajih',
        'name' => 'Slip Gajih',
    ]);
});

//penggajian
Route::get('/penggajian', function () {
    return view('pages.penggajian', [
        'type_menu' => 'penggajian',
        'title' => 'Penggajian',
        'name' => 'Penggajian',
    ]);
});
Route::get('/tambah-penggajian', function () {
    return view('pages.tambah-penggajian', [
        'type_menu' => 'tambah-penggajian',
        'title'

    ]);
});
