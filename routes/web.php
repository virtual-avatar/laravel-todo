<?php

use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'index'])
    ->name('todo.index');
Route::get('/create', [TodoController::class, 'create'])
    ->name('todo.create');
Route::post('/', [TodoController::class, 'store'])
    ->name('todo.store');
Route::delete('/{id}', [TodoController::class, 'destroy'])
    ->name('todo.destroy');
Route::get('todo/list', [TodoController::class, 'getTodos'])->name('todo.list');
