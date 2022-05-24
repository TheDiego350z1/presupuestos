<?php

use Illuminate\Support\Facades\Route;

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

// Llamamos a la vista login
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/entradas', function(){
    return view('entradas');
})->middleware('auth')->name('entradas');

Route::get('/egresos', function(){
    return view('egresos');
})->middleware('auth')->name('egresos');

Route::get('/reportes', [App\Http\Controllers\ReportesController::class, 'index'])->name('reportes');

Route::get('/reportes/generate-pdf', [App\Http\Controllers\ReportesController::class, 'generatePDF'])->name('generatePDF');

Route::get('/reportes/generate-mpdf', [App\Http\Controllers\ReportesController::class, 'generate_mPDF'])->name('generate_mPDF');
