<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Democontroller;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('index');
    
// })-> name('home');
// Route::get('/login', function () {
//     return view('login');
    
// });
Route::get('/' ,[HomeController::class, 'index'])->name('home');
Route::get('/article/{id}', [HomeController::class, 'article'])->name('article');



Route::get('/signup', function () {
    return view('signup');
    
});
// Route::get('/index', function () {
//     return view('index');
    
// });



// Route::get('/tag', function() {
//     return 'This is the tag page';
// });
// Route::get('/category', function() {
//     return 'This is the category page';
// });
// Route::get('/blog', function() {
//     return 'This is the blog page';
// });

// middleware(['auth', CheckAdmin::class])
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/login' ,[AuthController::class, 'login'])->name('login');
Route::post('/auth' ,[AuthController::class, 'auth'])->name('auth');
Route::post('/logout' ,[AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->  middleware('auth')  ->group(function() {
            // Route::get('/', [Developmentcontroller::class, 'index']);
        // Route::get('/category', [Democontroller::class, 'category']);
        // Route::get('/blog', [Democontroller::class, 'blog']);
        Route::get('/category', [CategoryController::class, 'index'])-> name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])-> name('category.create');
        Route::get('/category/{id}', [CategoryController::class, 'edit'])-> name('category.edit');
        Route::post('/category/store', [CategoryController::class, 'store'])-> name('category.store');
        Route::put('/category/{id}', [CategoryController::class, 'update'])-> name('category.update');
        Route::delete('/category/{id}', [CategoryController::class, 'delete'])-> name('category.delete');

        // Route::get('/tag', [Democontroller::class, 'tag']);
        // Route::get('/blog', [Democontroller::class, 'blog']);
        Route::get('/tag', [tagController::class, 'index'])-> name('tag.index');
        Route::get('/tag/create', [tagController::class, 'create'])-> name('tag.create');
        Route::get('/tag/{id}', [tagController::class, 'edit'])-> name('tag.edit');
        Route::post('/tag/store', [tagController::class, 'store'])-> name('tag.store');
        Route::put('/tag/{id}', [tagController::class, 'update'])-> name('tag.update');
        Route::delete('/tag/{id}', [tagController::class, 'delete'])-> name('tag.delete');


        // Route::get('/post', [Democontroller::class, 'post']);
        // Route::get('/blog', [Democontroller::class, 'blog']);
        Route::get('/post', [PostController::class, 'index'])-> name('post.index');
        Route::get('/post/create', [PostController::class, 'create'])-> name('post.create');
        Route::get('/post/{id}', [PostController::class, 'edit'])-> name('post.edit');
        Route::post('/post/store', [PostController::class, 'store'])-> name('post.store');
        Route::put('/post/{id}', [PostController::class, 'update'])-> name('post.update');
        Route::delete('/post/{id}', [PostController::class, 'destroy'])-> name('post.destroy');
});

