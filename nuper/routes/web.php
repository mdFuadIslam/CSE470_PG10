<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sell', function () {return view('sell');})->middleware(['auth', 'verified'])->name('sell');
Route::get('/rent', function () {return view('rent');})->middleware(['auth', 'verified'])->name('rent');
Route::get('/request', function () {return view('request');})->middleware(['auth', 'verified'])->name('request');
Route::get('/auction', function () {return view('auction');})->middleware(['auth', 'verified'])->name('auction');
Route::get('/active', [ProfileController::class,'active'])->middleware(['auth', 'verified'])->name('active');
Route::get('/application', [ProfileController::class,'application'])->middleware(['auth', 'verified'])->name('application');
Route::get('/businessCreation', function () {return view('businessCreation');})->middleware(['auth', 'verified'])->name('businessCreation');
Route::post('createBusiness',[ProfileController::class, 'createBusiness'])->middleware(['auth', 'verified'])->name('createBusiness');
Route::post('approval',[ProfileController::class, 'approval'])->middleware(['auth', 'verified'])->name('approval');

require __DIR__.'/auth.php';

Route::view("test","login");