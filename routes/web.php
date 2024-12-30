<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',function (){
    return view('layouts/app');
});


//admin
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('/adminview', [\App\Http\Controllers\AdminController::class,'index'])->name('adminview');// ke halaman adminview setelah login sebagai admin
    Route::resource('/adminadd',\App\Http\Controllers\BookController::class);// ke halaman adminadd setelah klik button "Add Book Catalog"
    Route::get('/adminedit/{id}', [\App\Http\Controllers\BookController::class, 'edit']);// ke halaman adminedit setelah klik button "Edit"
    Route::Patch('/adminedit/{id}', [\App\Http\Controllers\BookController::class, 'update']);// function untuk update book yang sudah di edit di halaman adminedit
    Route::Delete('/adminview/{id}', [\App\Http\Controllers\BookController::class, 'destroy']);
    Route::resource('/borrow', \App\Http\Controllers\BorrowController::class);// mendefinisikan semua function di borrowcontroller
    Route::Patch('/borrow/borrowindex/{id}', [\App\Http\Controllers\BorrowController::class, 'update']);// update ketika admin approve/acc di halaman borrowindex
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); //ke halaman setelah login sebagai user
Route::get('/home/search',[\App\Http\Controllers\HomeController::class, 'search']);
