<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LikeController;

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

Route::get('/', [PageController::class, 'index'])
    ->name('page.index');
Route::get('/dashboard', [PageController::class, 'dashboard'])
    ->name('page.dashboard');
Route::get('/list', [PageController::class, 'list'])
    ->name('page.list');

Route::get('/categories/new', [PageController::class, 'create_category'])
    ->name('page.create.category');
Route::get('/ideas/new', [PageController::class, 'create_idea'])
    ->name('page.create.idea');

Route::post('/categories/create', [FormController::class, 'create_category'])
    ->name('category.create');
Route::post('/ideas/create', [FormController::class, 'create_idea'])
    ->name('idea.create');

Route::get('/categories/delete/{id}', [FormController::class, 'delete_category'])
    ->name('category.delete');
Route::get('/ideas/delete/{id}', [FormController::class, 'delete_idea'])
    ->name('idea.delete');

Route::get('/categories/edit/{id}', [PageController::class, 'update_category'])
    ->name('category.edit');
Route::get('/ideas/edit/{id}', [PageController::class, 'update_idea'])
    ->name('idea.edit');

Route::get('/categories/update/{id}', [FormController::class, 'update_category'])
    ->name('category.update');
Route::get('/ideas/update/{id}', [FormController::class, 'update_idea'])
    ->name('idea.update');

Route::get('/ideas/like/{id}', LikeController::class)
    ->name('like.toggle');
