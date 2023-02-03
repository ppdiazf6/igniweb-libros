<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReservesController;

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
    return view('auth.login');
});

//Route::
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::group(['middleware' => 'auth'], function(){
	Route::group(['prefix' => 'admin'], function(){
		Route::group(['prefix' => 'home'], function(){
			Route::get('/', [HomeController::class, 'index']);
			Route::delete('reserve/delete/{id}', [HomeController::class, 'delete']);
		});
		
			
		Route::group(['prefix' => 'reserve'], function(){
			Route::get('/', [ReservesController::class, 'index']);
			Route::post('/create', [ReservesController::class, 'store']);
			Route::get('get_data_books/{id}', [ReservesController::class, 'get_data_books']);
		});
	});
});
