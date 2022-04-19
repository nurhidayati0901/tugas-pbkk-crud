<?php

use App\Http\Controllers\BookController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index'])->name('index');
Route::get('/book', [BookController::class, 'showInputForm'])->name('input-form');
Route::post('/book', [BookController::class, 'create'])->name('store-data');
Route::get('/detail/{id}', [BookController::class, 'detail'])->name('show-detail');
Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit-data');
Route::post('/update/{id}', [BookController::class, 'update'])->name('update-data');
Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('delete-data');