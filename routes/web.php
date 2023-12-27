<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes([  'register' => false,
                'reset'    => false,
                'verify'   => false,
                ]);
Route::get('/', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('showlogin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/FormJenisPengujian', [App\Http\Controllers\jenisPengujian::class, 'index'])->name('formJenisPengujian');
Route::get('/FormAnalisaSampel', [App\Http\Controllers\analisaSampel::class, 'index'])->name('FormAnalisaSampel');
Route::get('/jenisPemeriksaan', [App\Http\Controllers\jenisPemeriksaan::class, 'index'])->name('jenisPemeriksaan');
Route::get('/PermohonanAnalis', [App\Http\Controllers\permohonanAnalis::class, 'index'])->name('permohonanAnalis');
Route::get('/pendaftaran', [App\Http\Controllers\pendaftaranUserPemohon::class, 'index'])->name('pendaftaranPemohon');


