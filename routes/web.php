<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/dashboard',[DashboardController::class,'index']);
