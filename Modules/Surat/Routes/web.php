<?php

use Modules\Surat\Http\Controllers\CobaController;
use Modules\Surat\Http\Controllers\PrintsuratController;
use Modules\Surat\Http\Controllers\PrinttgskkController;
use Modules\Surat\Http\Controllers\SurattgskkController;
use Modules\Surat\Http\Controllers\DatapegawaiController;
use Modules\Surat\Http\Controllers\PrintedaranController;
use Modules\Surat\Http\Controllers\PrintperdinController;
use Modules\Surat\Http\Controllers\SuratedaranController;
use Modules\Surat\Http\Controllers\SuratkeluarController;
use Modules\Surat\Http\Controllers\SuratkosongController;
use Modules\Surat\Http\Controllers\SuratlemburController;
use Modules\Surat\Http\Controllers\SuratperdinController;
use Modules\Surat\Http\Controllers\BsuratkeluarController;


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

Route::prefix('surat')->group(function () {
    Route::get('/', 'SuratController@index');
    Route::resource('/suratmasuk', SuratmasukController::class);
    Route::resource('/suratkeluar', SuratkeluarController::class);
    Route::resource('/suratedaran', SuratedaranController::class);
    Route::resource('/suratperdin', SuratperdinController::class);
    Route::resource('/surattgskk', SurattgskkController::class);
    Route::resource('/suratlembur', SuratlemburController::class);
    Route::resource('/printsurat', PrintsuratController::class);
    Route::resource('/printedaran', PrintedaranController::class);
    Route::resource('/printtgskk', PrinttgskkController::class);
    Route::resource('/printperdin', PrintperdinController::class);
    // Route::get('/cetaksurat', [SuratkeluarController::class, 'show']);
    Route::resource('/bsuratkeluar', BsuratkeluarController::class);
    Route::resource('/datapegawai', DatapegawaiController::class);
    Route::resource('/suratkosong', SuratkosongController::class);
});
