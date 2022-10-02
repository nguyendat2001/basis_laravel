<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
//     return view('auth.add');
// });

Route::get('/',[UserController::class, 'show'])->name('auth.show');
Route::post('/',[UserController::class, 'store'])->name('auth.post');
Route::get('/login',[UserController::class, 'showLogin'])->name('auth.showLogin');
Route::post('/login',[UserController::class, 'postLogin'])->name('auth.postLogin');
Route::get('/home' ,[UserController::class, 'showHome'])->name('auth.showHome');

Route::get('/addproduct' ,[ProductController::class, 'ShowAddProduct'])->name('auth.ShowAddProduct');
Route::post('/addproduct' ,[ProductController::class, 'AddProduct'])->name('auth.AddProduct');

Route::get('/home/collection' ,[ProductController::class, 'collect'])->name('auth.collect');

Route::get('/home/collection/{id}' ,[ProductController::class, 'detail_product'])->name('auth.detail_product');
Route::get('/home/collection/{id}/Delete_product' ,[ProductController::class, 'Delete_product'])->name('auth.Delete_product');

Route::get('/home/collection/{id?}/Update_product' ,[ProductController::class, 'show_update_product'])->name('auth.show_update_product');
Route::post('/home/collection/{id?}/Update_product' ,[ProductController::class, 'Update_product'])->name('auth.Update_product');



