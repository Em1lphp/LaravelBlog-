<?php

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [\App\Http\Controllers\Admin\IndexController::class, '__invoke'])->middleware(['auth', 'admin'])->name('admin');
Route::get('/', [\App\Http\Controllers\Main\IndexController::class, 'index'])->name('main.index'); //главная страница сайта
//использую middleware, тем самым не даю попасть в админку любому юзеру
Route::get('/personal', [\App\Http\Controllers\Personal\IndexController::class, '__invoke'])->middleware(['auth'])->name('personal');
//использую middleware, чтобы только авторизованный пользователь мог попасть в личный кабинет

//вложенные роуты будут тут
Route::prefix('main')->group(function () {
    Route::get('/{post}', [\App\Http\Controllers\Main\IndexController::class, 'show'])->name('main.show');
    Route::group(['prefix' => '{post}/comment'], function () {
        Route::post('/',[\App\Http\Controllers\Main\Comment\StoreController::class,'store'])->name('comments.store');
});
    Route::group(['prefix' => '{post}/like'], function () {
        Route::post('/',[\App\Http\Controllers\Main\Like\StoreController::class,'store'])->name('likes.store');
    });



});

//Использую префикс для роутов админ.панели, также использую ресусрные роуты
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});

//Использую префикс для роутов личного кабинета, также использую обычные роуты, ибо полная реализация не нужна
Route::prefix('personal')->middleware(['auth'])->group(function () {
    //лайки
    Route::get('/like', [\App\Http\Controllers\Personal\LikedController::class, 'index'])->name('likes.index');
    Route::delete('/like{post}', [\App\Http\Controllers\Personal\LikedController::class, 'destroy'])->name('likes.destroy');

    //комментарии
    Route::get('/comment', [\App\Http\Controllers\Personal\CommentController::class, 'index'])->name('comment.index');
    Route::get('/comment{comment}/edit', [\App\Http\Controllers\Personal\CommentController::class, 'edit'])->name('comment.edit');
    Route::patch('/comment{comment}', [\App\Http\Controllers\Personal\CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment{comment}', [\App\Http\Controllers\Personal\CommentController::class, 'destroy'])->name('comment.destroy');
});


