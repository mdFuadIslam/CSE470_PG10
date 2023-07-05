<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userHandler;

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

Route::get('/', function () {return view('welcome');});

Route::get('/signup', function () {return view('signup');});
Route::post('newUser',[userHandler::class,'newUser']);
#Route::get('/home', function () {return view('welcome');});
Route::get('/error/{id}', [userHandler::class,'error']);
Route::get('login', function () {return view('login');});
Route::post('login',[userHandler::class,'login']);
Route::get('home/{id}/logout', function () {return redirect('/');});
Route::get('home/{id}/business', function () {return view ('viewBusiness');});
Route::get('home/{id}/businessCreation/', [userHandler::class,'passUsername']);
Route::post('home/{id}/createBusiness',[userHandler::class,'createBusiness']);
Route::get('home/{id}',[userHandler::class,'home']);
