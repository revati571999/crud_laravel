<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


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
    return view('crud.dashboard.AddPost');
});
Route::get('/AddPost',[CrudController::class,'create'])->name('AddPost');
Route::post('/store',[CrudController::class,'store'])->name('store');
Route::get('/PostList',[CrudController::class,'show'])->name('PostList');
Route::get('/EditPost/{id}',[CrudController::class,'edit'])->name('EditPost');
Route::post('/update',[CrudController::class,'update'])->name('update');
Route::get('/DeletePost/{id}',[CrudController::class,'destory'])->name('DeletePost');





