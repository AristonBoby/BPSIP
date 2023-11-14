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
Route::get('/inputdokumen', [App\Http\Controllers\suratmasuk::class, 'index'])->name('suratmasuk');
Route::get('/dokumen', [App\Http\Controllers\dokumen::class, 'index'])->name('dokumen');

Route::get('/viewedokumen/{id}', [App\Livewire\Tablesuratmasuk::class, 'viewedok'])->name('edukumen');


