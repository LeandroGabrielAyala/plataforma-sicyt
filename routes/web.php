<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PostController as ControllersPostController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

// Inicio del Blog
Route::get('/', [ControllersPostController::class, 'index'])->name('posts.index');

// Listado de Posts
Route::get('posts/{post}', [ControllersPostController::class, 'show'])->name('posts.show');

// Filtrar posts por Categorías
Route::get('category/{category}', [ControllersPostController::class, 'category'])->name('posts.category');

// Filtrar posts por Tags
Route::get('tag/{tag}', [ControllersPostController::class, 'tag'])->name('posts.tag');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Vista de Administrador
    // Dashboard
Route::get('admin', [HomeController::class, 'index'])->name('admin.home');

    // Category CRUD
Route::resource('admin/categories', CategoryController::class)->names('admin.categories');

    // Tag CRUD
Route::resource('admin/tags', TagController::class)->names('admin.tags');

    // Post CRUD
Route::resource('admin/posts', PostController::class)->names('admin.posts');
