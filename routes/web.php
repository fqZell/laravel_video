<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Middleware\AdminMiddleware;
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

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/signUp', 'signUp')->name('signUp');
    Route::get('/signIn', 'signIn')->name('signIn');
    Route::get('/create', 'create')->name('create');
    Route::get('/single', 'single')->name('single');
});

Route::controller(AuthController::class)->prefix('/auth')->as('auth.')->group(function () {
    Route::post('/signUp', 'signUp')->name('signUp'); // auth.signup
    Route::post('/signIn', 'signIn')->name('signIn'); // auth.signin

    Route::get('/logout', 'logout')->name('logout'); // auth.logout
});

Route::controller(VideoController::class)->prefix('/videos')->as('video.')->group(function () {

        Route::post('/create', 'store')->name('create');

//        Route::middleware(['auth', AdminMiddleware::class])->group(function () {
            Route::get('/{video:id}/delete', 'delete')->name('delete');

            Route::get('/{video:id}/update', 'updateForm')->name('updateForm');
            Route::post('/{video:id}/update', 'update')->name('update');
//        });

        Route::get('/{video:id}', 'single')->name('single'); // article.single

//    Route::post('/{video}/like', [VideoController::class, 'like'])->name('like');

});

Route::controller(CommentController::class)
    ->prefix('/comments')
    ->as('comment.')
    ->middleware('auth')
    ->group(function () {
        Route::post('/create', 'store')->name('store');
    });
