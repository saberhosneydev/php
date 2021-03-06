<?php

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
Route::get('/', 'PagesController@welcome')->name('welcome');
Auth::routes();
Route::resource('home/projects', 'ProjectsController');
Route::resource('home/tasks', 'TasksController');
Route::resource('home/boards', 'BoardsController');
Route::patch('/tasks/completed', 'TasksController@completed')->name('tasks.completed');