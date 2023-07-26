<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleManagement;
use App\Http\Controllers\ForumManagement;
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
    $data=DB::select("select * from sales limit 5");
    $datatwo=DB::select("select * from rents limit 5");
    return view("welcome",['sellProducts'=>$data,'rentProducts'=>$datatwo]);
});
Route::get('/home', function () {
    $data=DB::select("select * from sales limit 5");
    $datatwo=DB::select("select * from rents limit 5");
    return view("welcome",['sellProducts'=>$data,'rentProducts'=>$datatwo]);
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/rent', function () {return view('rent');})->middleware(['auth', 'verified'])->name('rent');
Route::get('/request', function () {return view('request');})->middleware(['auth', 'verified'])->name('request');
Route::get('/auction', function () {return view('auction');})->middleware(['auth', 'verified'])->name('auction');
Route::get('/active', [ProfileController::class,'active'])->middleware(['auth', 'verified'])->name('active');
Route::get('/application', [ProfileController::class,'application'])->middleware(['auth', 'verified'])->name('application');
Route::get('/businessCreation', function () {return view('businessCreation');})->middleware(['auth', 'verified'])->name('businessCreation');
Route::post('createBusiness',[ProfileController::class, 'createBusiness'])->middleware(['auth', 'verified'])->name('createBusiness');
Route::post('approval',[ProfileController::class, 'approval'])->middleware(['auth', 'verified'])->name('approval');
Route::post('createSale',[SaleManagement::class, 'createSale'])->middleware(['auth', 'verified'])->name('createSale');
require __DIR__.'/auth.php';

Route::get('productView/{id}',[SaleManagement::class,'showProduct']);

Route::get('/sell', function () {return view('sell');})->middleware(['auth', 'verified'])->name('sell');
Route::post('addToCart', [SaleManagement::class,'addToCart'])->middleware(['auth', 'verified'])->name('addToCart');
Route::post('addToWishlist', [SaleManagement::class,'addToWishlist'])->middleware(['auth', 'verified'])->name('addToWishlist');

Route::get("cart",[SaleManagement::class,"cart"])->middleware(['auth', 'verified'])->name('cart');

Route::get("thread",[ForumManagement::class,"thread"]);
Route::view("createThread","createThread")->middleware(['auth', 'verified'])->name('createThread');
Route::post("createThread",[ForumManagement::class,"createThread"])->middleware(['auth', 'verified'])->name('createThread');
Route::get("thread/{id}",[ForumManagement::class,"threadView"]);
Route::post("thread/comment",[ForumManagement::class,"comment"])->middleware(['auth', 'verified'])->name('comment');
Route::post("thread/deleteThread",[ForumManagement::class,"deleteThread"])->middleware(['auth', 'verified'])->name('deleteThread');
Route::post("thread/ban",[ForumManagement::class,"ban"])->middleware(['auth', 'verified'])->name('ban');
Route::get ("thread/thread",function () {return redirect('thread');});
Route::get("latestThread",[ForumManagement::class,"latestThread"]);
Route::get("oldestThread",[ForumManagement::class,"oldestThread"]);
Route::post("searchThread",[ForumManagement::class,"searchThread"]);