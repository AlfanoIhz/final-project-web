<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\MenuController;

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

// Route::get('/', function () {
//     return redirect()->to('/home');
// });

Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');

Route::get('/login', [PageController::class, 'login'])->name('login');

Route::get('/menu', [MenuController::class, 'index']);

Route::post('/menu/add-to-order/{id}', [MenuController::class, 'addToOrder'])->name('menu.addToOrder');

Route::get('/orders', [MenuController::class, 'showOrder'])->name('menu.showOrder');