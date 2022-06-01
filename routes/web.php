<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home');

// Category Controller
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::post('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');

// Product Controller
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::post('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');