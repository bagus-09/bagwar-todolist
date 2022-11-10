<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
 
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); //, 'verified'

require __DIR__.'/auth.php';

Route::resource('tasks', TaskController::class)->middleware(['auth']);

Route::get('/search', [TaskController::class, 'search'])->name('tasks.search');
