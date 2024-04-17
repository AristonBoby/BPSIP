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

Route::get('/', [App\Http\Controllers\home::class,'index'])->name('branda');
Route::get('/jenisLayanan', [App\Http\Controllers\jenisLayanan::class,'index'])->name('jenisLayanan');

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/FormJenisPengujian', [App\Http\Controllers\jenisPengujian::class, 'index'])->middleware('auth')->name('formJenisPengujian');
Route::get('/FormAnalisaSampel', [App\Http\Controllers\analisaSampel::class, 'index'])->name('FormAnalisaSampel');
Route::get('/jenisPemeriksaan', [App\Http\Controllers\jenisPemeriksaan::class, 'index'])->name('jenisPemeriksaan');
Route::get('/PermohonanAnalis', [App\Http\Controllers\permohonanAnalis::class, 'index'])->middleware('auth')->name('permohonanAnalis');
Route::get('/pendaftaran', [App\Http\Controllers\pendaftaranUserPemohon::class, 'index'])->name('pendaftaranPemohon');
Route::get('/dataAnalis', [App\Http\Controllers\dataAnalis::class, 'index'])->name('dataAnalis');
Route::get('/master-user', [App\Http\Controllers\masterUser::class, 'index'])->name('masterUsers');
Route::get('/pendaftaran', [App\Http\Controllers\pendaftaraanGuest::class, 'index'])->name('pendaftaran');
Route::get('/print/permohonan/{id}', [App\Http\Controllers\printPermohoanan::class, 'index'])->name('printPermohonan');

// User Guest //
Route::post('/insert-pendaftaran',[App\Http\Controllers\pendaftaraanGuest::class],'store')->name('guest.daftar');




