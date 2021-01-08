<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
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

Route::get('/dashboard', [ArticlesController::class , 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/dashboard/new/article', [ArticlesController::class, 'create'])->middleware(['auth'])->name('newArticle');
Route::post('/articles', [ArticlesController::class, 'store'])->middleware(['auth'])->name('storeArticle');
Route::get('/{category:name}/{article:slug}', [ArticlesController::class, 'show'])->name('showArticle');