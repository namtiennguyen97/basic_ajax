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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/computer',[\App\Http\Controllers\ComputerController::class, 'index'])->name('computer.index');
Route::post('/computer/add', [\App\Http\Controllers\ComputerController::class,'store'])->name('computer.store');
Route::get('/computer/delete/{id}',[\App\Http\Controllers\ComputerController::class, 'delete'])->name('computer.delete');
Route::get('/computer/show/{id}',[\App\Http\Controllers\ComputerController::class, 'show'])->name('computer.show');
Route::post('/computer/update/{id}',[\App\Http\Controllers\ComputerController::class, 'update'])->name('computer.update');
