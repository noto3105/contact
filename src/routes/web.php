<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/', [AdminController::class, 'index']);
Route::get('/login', function() {
    return view('auth.login');
})->name('login');
Route::middleware(['auth'])->group(function(){
    Route::get('/admin', function() {
        return view('/admin');
    })->name('admin');
});
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin');
Route::get('/admin/search', [AdminController::class, 'search']);
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');