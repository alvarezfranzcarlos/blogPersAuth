<?php

use App\Http\Controllers\PostController;
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

Route::get('/',[PostController::class,'getIndex'])->name('blog.index');

Route::get('post/{id}',[PostController::class,'getPost'])->name('blog.post');
Route::get('post/{id}/like',[PostController::class,'getLikePost'])->name('blog.post.like');

Route::get('about', function () {
    return view('other.about');
})->name('other.about');

Route::group(['prefix' => 'admin'], function (){

    Route::get('',[PostController::class,'getAdminIndex'])->middleware(['auth'])->name('admin.index');

    Route::get('create',[PostController::class,'getAdminCreate'])->middleware(['auth'])->name('admin.create');

    Route::post('create',[PostController::class,'postAdminCreate'])->middleware(['auth'])->name('admin.create');

    Route::get('edit/{id}',[PostController::class,'getAdminEdit'])->middleware(['auth'])->name('admin.edit');

    Route::get('delete/{id}',[PostController::class,'getAdminDelete'])->middleware(['auth'])->name('admin.delete');

    Route::post('edit',[PostController::class,'postAdminUpdate'])->middleware(['auth'])->name('admin.update');

});

require __DIR__.'/auth.php';
