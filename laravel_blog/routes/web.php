<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/sample', function () {
    return view('pages.sample');
});



require __DIR__.'/auth.php';

Route::get('/dashboard', [ArticleController::class , 'listUserArticles'])->name('dashboard')->middleware(['auth']);

Route::prefix('{category:name}')->group(function () {
    Route::get('{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
    Route::get('/', [CategoryController::class, 'show'])->name('category.show');
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('new/article', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('new/article', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('account/settings', [UserController::class, 'edit'])->name('account.settings');
        Route::post('account/settings', [UserController::class, 'update'])->name('account.settings.update');
    });
});