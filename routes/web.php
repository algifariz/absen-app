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

Route::get('/data-guru', function () {
    $dataguru = ModelsGuru::all();
    return view('pages.data-guru', [
        'type_menu' => 'data guru',
        'title' => 'Data Guru',
        'guru' => $dataguru
    ]);
});

Route::get('/rekap-absen', function () {
    return view('pages.rekap-absen', [
        'title' => 'Rekap Absen',
        'type_menu' => 'rekap'
    ]);
});

Route::get('/status-guru', [App\Http\Controllers\PresensiController::class, 'index']);

Route::get('/tingkat-honor', function () {
    $datatingkatan = ModelsTingkatan::all();
    return view('pages.tingkat-honor', [
        'type_menu' => 'tingkat honor',
        'title' => 'Tingkat Honor',
        'tingkatan' => $datatingkatan
    ]);
});
// Route::get('/data-tunjangan', function () {
//     return view('pages.data-tunjangan', [
//         'type_menu' => 'components',
//         'title' => 'Data Tunjangan',
//     ]);
// });
Route::get('/scan', function () {
    return view('pages.scan', [
        'type_menu' => 'scan qr',
        'title' => 'Scan Qr Code',
        'name' => 'Scan Qr Code',
    ]);
});

// Guru
Route::get('/tambah-data', [App\Http\Controllers\GuruController::class, 'tambah']);
Route::post('/guru/simpan_guru', [App\Http\Controllers\GuruController::class, 'simpan_guru']);
Route::get('/edit-data/{id}', [App\Http\Controllers\GuruController::class, 'edit']);
Route::put('/updateGuru/{id}', [App\Http\Controllers\GuruController::class, 'update'])->name('updateGuru');
Route::delete('/hapusGuru/{id}', [App\Http\Controllers\GuruController::class, 'destroy']);

// Tingkatan
Route::get('/tambah-tingkatan', [App\Http\Controllers\TingkatanController::class, 'tambah']);
Route::post('/tingkatan/simpan_tingkatan', [App\Http\Controllers\TingkatanController::class, 'simpan_tingkatan']);
Route::get('/edit-tingkatan/{id}', [App\Http\Controllers\TingkatanController::class, 'edit']);
Route::put('/updateTingkatan/{id}', [App\Http\Controllers\TingkatanController::class, 'update'])->name('updateTingkatan');
Route::delete('/hapusTingkatan/{id}', [App\Http\Controllers\TingkatanController::class, 'destroy']);

// Tunjangan
Route::get('/data-tunjangan', [App\Http\Controllers\TunjanganController::class, 'index']);
Route::get('/tambah-data-tunjangan', [App\Http\Controllers\TunjanganController::class, 'tambah']);
Route::post('/tunjangan/simpan_tunjangan', [App\Http\Controllers\TunjanganController::class, 'simpan_tunjangan']);
Route::get('/edit-data-tunjangan/{id}', [App\Http\Controllers\TunjanganController::class, 'edit']);
Route::put('/updateTunjangan/{id}', [App\Http\Controllers\TunjanganController::class, 'update'])->name('updateTunjangan');
Route::delete('/hapusTunjangan/{id}', [App\Http\Controllers\TunjanganController::class, 'destroy']);

// Generate QR Code
Route::get('/generate-qr-code', [App\Http\Controllers\QrController::class, 'index'])->name('generate-qr-code');
Route::post('/generate-qr-code-guru', [App\Http\Controllers\QrController::class, 'generate_qr_code_guru']);

// Register
Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index']);
Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);

// Login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);

// Logout
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

//scan
Route::get('/scan', [App\Http\Controllers\ScanController::class, 'index']);
Route::post('/validasi', [App\Http\Controllers\ScanController::class, 'validasi'])->name('validasi');
