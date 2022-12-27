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

Route::redirect('/', '/dashboard-general-dashboard');

// Dashboard
Route::get('/dashboard-general-dashboard', function () {
    return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
});
Route::get('/dashboard-ecommerce-dashboard', function () {
    return view('pages.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});


Route::get('/data-guru', function () {
    $dataguru = ModelsGuru::all();
    return view('pages.data-guru', [
        'type_menu' => 'data guru',
        'title' => 'Data Guru',
        'guru' => $dataguru
    ]);
});

// Route::get('/data-guru', [App\Http\Controllers\GuruController::class, 'index'])->name('data-guru');

Route::get('/rekap-absen', function () {
    return view('pages.rekap-absen', [
        'title' => 'Rekap Absen',
        'type_menu' => 'rekap'
    ]);
});
Route::get('/status-guru', function () {
    return view('pages.status-guru', ['type_menu' => 'status']);
});
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

Route::get('/tambah-tingkatan', [App\Http\Controllers\TingkatanController::class, 'tambah']);
Route::post('/tingkatan/simpan_tingkatan', [App\Http\Controllers\TingkatanController::class, 'simpan_tingkatan']);
Route::get('/edit-tingkatan/{id}', [App\Http\Controllers\TingkatanController::class, 'edit']);
Route::put('/updateTingkatan/{id}', [App\Http\Controllers\TingkatanController::class, 'update'])->name('updateTingkatan');
Route::delete('/hapusTingkatan/{id}', [App\Http\Controllers\TingkatanController::class, 'destroy']);

Route::get('/data-tunjangan', [App\Http\Controllers\TunjanganController::class, 'index']);
Route::get('/tambah-data-tunjangan', [App\Http\Controllers\TunjanganController::class, 'tambah']);
Route::post('/tunjangan/simpan_tunjangan', [App\Http\Controllers\TunjanganController::class, 'simpan_tunjangan']);
Route::get('/edit-data-tunjangan/{id}', [App\Http\Controllers\TunjanganController::class, 'edit']);
Route::put('/updateTunjangan/{id}', [App\Http\Controllers\TunjanganController::class, 'update'])->name('updateTunjangan');
Route::delete('/hapusTunjangan/{id}', [App\Http\Controllers\TunjanganController::class, 'destroy']);
// auth
Route::get('/auth-forgot-password', function () {
    return view('pages.auth-forgot-password', ['type_menu' => 'auth']);
});
Route::get('/auth-login', function () {
    return view('pages.auth-login', ['type_menu' => 'auth']);
});
Route::get('/auth-login2', function () {
    return view('pages.auth-login2', ['type_menu' => 'auth']);
});
Route::get('/auth-register', function () {
    return view('pages.auth-register', ['type_menu' => 'auth']);
});
Route::get('/auth-reset-password', function () {
    return view('pages.auth-reset-password', ['type_menu' => 'auth']);
});
