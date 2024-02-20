<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/',[MainController::class,'index'])->name('main.index');

Route::prefix('admin')
    ->middleware(['auth','verified','admin'])
    ->group(function() {
    Route::get('/',[AdminMainController::class,'index'])->name('admin.main.index');

    Route::resource('categories', CategoryController::class)->names(
        [
            'index'=> 'admin.categories.index',
            'create'=> 'admin.categories.create',
            'store'=> 'admin.categories.store',
            'show'=> 'admin.categories.show',
            'edit'=> 'admin.categories.edit',
            'update'=> 'admin.categories.update',
            'destroy' => 'admin.categories.destroy'
        ]
    );
    Route::resource('tags', TagController::class)->names(
        [
            'index'=> 'admin.tags.index',
            'create'=> 'admin.tags.create',
            'store'=> 'admin.tags.store',
            'show'=> 'admin.tags.show',
            'edit'=> 'admin.tags.edit',
            'update'=> 'admin.tags.update',
            'destroy' => 'admin.tags.destroy'
        ]
    );
    Route::resource('posts', PostController::class)->names(
        [
            'index'=> 'admin.posts.index',
            'create'=> 'admin.posts.create',
            'store'=> 'admin.posts.store',
            'show'=> 'admin.posts.show',
            'edit'=> 'admin.posts.edit',
            'update'=> 'admin.posts.update',
            'destroy' => 'admin.posts.destroy'
        ]
    );
    Route::resource('users', UserController::class)->names(
        [
            'index'=> 'admin.users.index',
            'create'=> 'admin.users.create',
            'store'=> 'admin.users.store',
            'show'=> 'admin.users.show',
            'edit'=> 'admin.users.edit',
            'update'=> 'admin.users.update',
            'destroy' => 'admin.users.destroy'
        ]
    );

});

Auth::routes(['verify' => true]);
