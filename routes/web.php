<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LogUserController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;



Route::middleware(['web'])->group(function () {

    // Authentication Routes
    Route::get('login', [LogUserController::class, 'index'])->name('login');
    Route::post('post-login', [LogUserController::class, 'postLogin'])->name('login.post');
    Route::get('logout', [LogUserController::class, 'logout'])->name('logout');

    // Registration Routes
    Route::get('register', [RegisterUserController::class, 'register'])->name('register');
    Route::post('post-register', [RegisterUserController::class, 'postRegister'])->name('register.post');

    //Forgot password and Reset password
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request'); // Show form to request password reset link
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email'); // Send reset link to user's email
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset'); // Show form to reset password
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update'); // Handle the password reset

    //Categories
    Route::resource('categories', CategoryController::class)->except(['create'])->middleware('auth');

    //Tags
    Route::resource('tags', TagController::class)->except(['create'])->middleware('auth');

    //Comments
    Route::post('comments/{post_id}', ['uses'=>'CommentsController@store', 'as' => 'comments.store']);

    Route::get('blog/{slug}', [BlogController::class, 'single'])
    ->name('blog.single')
    ->where('slug', '[\w\d\-\_]+');
    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('contact', [PagesController::class, 'contact'])->name('contact');
    Route::post('contact', [PagesController::class, 'postcontact'])->name('contact');
    Route::get('about', [PagesController::class, 'about'])->name('about');
    Route::get('/', [PagesController::class, 'index'])->name('index');
    Route::resource('posts', PostController::class)->middleware('auth');
});