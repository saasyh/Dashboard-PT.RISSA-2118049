<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');



Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::get('pegawai/cetak', ['as' => 'pegawai.cetak', 'uses' => '\App\Http\Controllers\PegawaiController@cetak']);
Route::resource('pegawai', \App\Http\Controllers\PegawaiController::class);

Route::get('pendidikan/cetak', ['as' => 'pendidikan.cetak', 'uses' => '\App\Http\Controllers\PendidikanController@cetak']);
Route::resource('pendidikan', \App\Http\Controllers\PendidikanController::class);

Route::resource('pengembangan', \App\Http\Controllers\PengembanganController::class);

Route::resource('jenisijin', \App\Http\Controllers\JenisijinController::class);

Route::get('pengajuan/cetak', ['as' => 'pengajuan.cetak', 'uses' => '\App\Http\Controllers\PengajuanController@cetak']);
Route::resource('pengajuan', \App\Http\Controllers\PengajuanController::class);

Route::resource('absensi', \App\Http\Controllers\AbsensiController::class);

Route::get('gaji/cetak', ['as' => 'gaji.cetak', 'uses' => '\App\Http\Controllers\GajiController@cetak']);
Route::resource('gaji', \App\Http\Controllers\GajiController::class);


Route::get('tunjangan/cetak', ['as' => 'tunjangan.cetak', 'uses' => '\App\Http\Controllers\TunjanganController@cetak']);
Route::resource('tunjangan', \App\Http\Controllers\TunjanganController::class);
