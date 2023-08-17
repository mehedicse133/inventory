<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ItemController;
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

// Brand
Route::resource('/brand', BrandController::class);
// Route::get('/brand/create',[BrandController::class, 'create'])->name('brand.create');
// Route::post('/brand/store',[BrandController::class, 'store'])->name('brand.store');

Route::post('/brand-check',[BrandController::class, 'check']);
Route::post('/update-brand',[BrandController::class, 'update'])->name('update.brand');
Route::get('/brand/destroy/{id}',[BrandController::class, 'destory']);
// Model
Route::resource('/model', ModelController::class);
Route::post('/model-check',[ModelController::class, 'check']);
Route::post('/update-model',[ModelController::class, 'model_update'])->name('update.model');
Route::get('/model/destroy/{id}',[ModelController::class, 'destory']);
// Item
Route::resource('/item', ItemController::class);
Route::post('/item-check',[ItemController::class, 'check']);
Route::post('/update-item',[ItemController::class, 'update'])->name('update.item');
Route::get('/item/destroy/{id}',[ItemController::class, 'destory']);






