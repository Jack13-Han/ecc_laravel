<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Kadai01Controller;
use App\Http\Controllers\Sample02_1Controller;
use App\Http\Controllers\Kadai02_1Controller;
use App\Http\Controllers\Kadai02_2Controller;
use App\Http\Controllers\Kadai02_3Controller;
use App\Http\Controllers\sample02_2Controller;
use App\Http\Controllers\sample02_3Controller;
use App\Http\Controllers\Kadai02_4Contrller;

use App\Http\Controllers\Kadai03Controller;
use App\Http\Controllers\Kadai04Controller;


use App\Http\Controllers\SampleController;

use App\Http\Controllers\ArticlesController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//Kadai01
Route::get('/kadai01', [Kadai01Controller::class, 'index']);
//Kadai02
Route::get('/sample02_1', [Sample02_1Controller::class, 'index']);
//sample02_2
Route::get('/sample02_2', [sample02_2Controller::class, 'index']);

//sample02_3
Route::get('/sample02_3', [sample02_3Controller::class, 'index']);

//Kadai02_1
Route::get('/kadai02_1', [Kadai02_1Controller::class, 'index']);

//Kadai02_2
Route::get('/kadai02_2', [Kadai02_2Controller::class, 'index']);

//Kadai02_3
Route::get('/kadai02_3', [Kadai02_3Controller::class, 'index']);

//Kadai02_4
Route::get('/kadai02_4', [Kadai02_4Contrller::class, 'index']);

//Kadai03_1
Route::get('/kadai03', [Kadai03Controller::class, 'index']);
Route::get('/kadai03/registration', [Kadai03Controller::class, 'create']);
Route::get('/kadai03/detail', [Kadai03Controller::class, 'show']);
Route::get('/kadai03/edit', [Kadai03Controller::class, 'edit']);

Route::get('/kadai04', [Kadai04Controller::class, 'index'])->name('kadai04.index');
Route::post('/kadai04/confirm', [Kadai04Controller::class, 'confirm'])->name('kadai04.confirm');
Route::post('/kadai04', [Kadai04Controller::class, 'post'])->name('kadai04.post');


Route::get('/kadai04/clear', [Kadai04Controller::class, 'clear'])->name('kadai04.clear');


Route::resource('sample06', SampleController::class);

Route::resource('articles', ArticlesController::class);
