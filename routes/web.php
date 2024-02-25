<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Personal\CommentController as PersonalCommentController;
use App\Http\Controllers\Personal\LikedController;
use App\Http\Controllers\Personal\MainController as PersonalMainController;
use App\Http\Controllers\PostController;
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

        Route::resource('categories', AdminCategoryController::class)->names(
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
        Route::resource('posts', AdminPostController::class)->names(
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

Route::resource('posts', PostController::class)->only(['index','show']);
Route::resource('posts.comments',CommentController::class)->except('index');
Route::resource('posts.likes',LikeController::class)
    ->middleware(['auth','verified'])
    ->only('store');

Route::resource('categories',CategoryController::class)->only(['index','show']);

Route::prefix('personal')
    ->middleware(['auth','verified'])
    ->group(function(){
        Route::get('/',[PersonalMainController::class,'index'])->name('personal.main.index');
        Route::resource('comments', PersonalCommentController::class)
            ->except(['create','show','store'])
            ->names([
                'index' => 'personal.comments.index',
                'show' => 'personal.comments.show',
                'edit' => 'personal.comments.edit',
                'update' => 'personal.comments.update',
                'destroy' => 'personal.comments.destroy'
            ]);
        Route::resource('liked', LikedController::class)
            ->only(['index','show','destroy'])
            ->names([
                'index' => 'personal.liked.index',
                'show'=>'personal.like.show',
                'destroy' => 'personal.liked.destroy'
            ]);
    });



Auth::routes(['verify' => true]);
