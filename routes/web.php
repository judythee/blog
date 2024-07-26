<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;

Route::get('contact', [PagesController::class,'contact'])->name('contact');

Route::get('about', [PagesController::class,'about'])->name('about');

Route::get('/', [PagesController::class,'index'])->name('index');

Route::resource('posts', PostController::class);