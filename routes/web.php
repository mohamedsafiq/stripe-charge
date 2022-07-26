<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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

Route::get('buyproduct/{products}', [ProductsController::class, 'buyproduct'])->name('buyproduct');
Route::get('store', 'ProductsController@store')->name('store');

// Route::post('store',[ProductsController::class, 'store']);