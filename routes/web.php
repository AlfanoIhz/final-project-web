<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [PageController::class, 'dashboard'])->name('landing-page')->middleware('guest');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');

Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register-form')->middleware('guest');
Route::post('/register', [LoginController::class, 'register'])->name('admin.register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login-form')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/add-menu', [AdminController::class, 'showAddMenu'])->name('showMenu')->middleware('auth');
Route::post('/admin/add-menu', [AdminController::class, 'addMenu'])->name('menu.add');

Route::get('/admin/edit-menu', [AdminController::class, 'showEditMenu'])->name('menu.showEdit')->middleware('auth');
Route::post('/admin/update-menu', [AdminController::class, 'update'])->name('menu.update');

Route::get('/admin/menu-details', [AdminController::class, 'showMenuDetails'])->name('menu.details')->middleware('auth');
Route::delete('/admin/destroy-menu/{id}', [AdminController::class, 'destroy'])->name('menu.destroy');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::post('/menu/add-to-order/{id}', [MenuController::class, 'addToOrder'])->name('menu.addToOrder');
Route::get('/orders', [MenuController::class, 'showOrder'])->name('menu.showOrder');