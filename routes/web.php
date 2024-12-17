<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home.index');

Route::prefix('account')->group(function () {

    //Guest middleware for user
    Route::middleware(['guest'])->group(function () {
        //Login user: http://127.0.0.1:8000/account/login
        Route::get('login', [UserController::class, 'index'])->name('account.login');
        Route::post('login', [UserController::class, 'login'])->name('account.login');
        //Register user: http://127.0.0.1:8000/account/login
        Route::get('register', [UserController::class, 'register'])->name('account.register');
        Route::post('processRegister', [UserController::class, 'processRegister'])->name('account.processRegister');
    });

    //Authentication middleware for user
    Route::middleware(['auth'])->group(function () {
        //Register user: http://127.0.0.1:8000/account/login
        Route::get('logout', [UserController::class, 'logout'])->name('account.logout');
        //Dashboard user: http://127.0.0.1:8000/account/dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
    });
});

Route::prefix('admin')->group(function () {
    //Guest middleware for admin
    Route::middleware(['admin.guest'])->group(function () {
        //Admin Login GET: http://127.0.0.1:8000/admin/login
        Route::get('login', [AdminController::class, 'index'])->name('admin.login');
        Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    });

    //Authentication middleware for admin
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('category/index', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('category/add-cetegory', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('category/add-cetegory', [CategoryController::class, 'store'])->name('admin.category.store');
    });
});

//http://127.0.0.1:8000/admin/category/edit
Route::get('admin/category/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
