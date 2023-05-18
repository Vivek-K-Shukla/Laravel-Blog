<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Pannel Section..............................................................................
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Category Section
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/add-category', [CategoryController::class, 'create']);
    Route::post('/add-category', [CategoryController::class, 'store']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit']);
    Route::post('/update-category', [CategoryController::class, 'update']);
    // Route::get('/delete-category/{id}',[CategoryController::class,'delete']);
    Route::post('/delete-category', [CategoryController::class, 'delete']);

    // Post Section
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/add-posts', [PostController::class, 'create']);
    Route::post('/add-post', [PostController::class, 'store']);
    Route::get('/edit-post/{id}', [PostController::class, 'edit']);
    Route::put('/update-post/{id}', [PostController::class, 'update']);
    Route::get('/delete-post/{id}', [PostController::class, 'delete']);

    // User Section
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/edit-user/{id}', [UserController::class, 'edit']);
    Route::put('/update-user/{id}', [UserController::class, 'update']);
});

// .........................................................................................................



// Frontend Pannel Section..................................................................................
Route::get('user', [FrontendController::class, 'index']);
Route::get('tutorial/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('/tutorial/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);
