<?php

use App\Http\Controllers\UrlController;
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
Route::get('/analyzer', [UrlController::class, 'formShow'])->name('analyzer.formShow');

Route::post('/analyzer', [UrlController::class, 'store'])->name('analyzer.store');

Route::get('/analyzer/urls', [UrlController::class, 'index'])->name('analyzer.index');

Route::get('/analyzer/{id}', [UrlController::class, 'show'])->name('analyzer.show');
