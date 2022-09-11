<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TodolistsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('todolists',TodolistsController::class);
Route::post('/getUpdate_task',[TodolistsController::class, 'getUpdate_task'])->name('get.todo.update_task');
Route::post('/getTodoDetails',[TodolistsController::class, 'getTodoDetails'])->name('get.todo.details');
Route::post('/updateTodoDetails',[TodolistsController::class, 'updateTodoDetails'])->name('update.task.details');
Route::post('/deleteTodo',[TodolistsController::class,'deleteTodo'])->name('delete.todo');
