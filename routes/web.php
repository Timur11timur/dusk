<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostsController::class, 'index']);

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/{post}', [PostsController::class, 'show'])->name('show');
    Route::middleware('auth')
        ->group(function () {
            Route::get('/create', [PostsController::class, 'create'])->name('create');
            Route::post('/', [PostsController::class, 'store'])->name('store');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
