<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

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

Route::get('/', [PageController::class, 'dashboard'])->name('landing-page');

Route::prefix('admin')->group(function () {
    Route::get('/register', [LoginController::class, 'showAdminRegisterForm'])->name('admin.register-form');
    Route::post('/register', [LoginController::class, 'adminRegister'])->name('admin.register');
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login-form');
    Route::post('/login', [LoginController::class, 'adminLogin'])->name('admin.login');
});

Route::prefix('user')->group(function () {
    Route::get('/register', [LoginController::class, 'showUserRegisterForm'])->name('user.register-form');
    Route::post('/register', [LoginController::class, 'userRegister'])->name('user.register');
    Route::get('/login', [LoginController::class, 'showUserLoginForm'])->name('user.login-form');
    Route::post('/login', [LoginController::class, 'userLogin'])->name('user.login');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin-logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::post('/admin/add-menu', [AdminController::class, 'addMenu'])->name('menu.add');
    Route::put('/admin/update-menu/{id}', [AdminController::class, 'updateMenu'])->name('menu.update');
    Route::get('/admin/menu-details', [AdminController::class, 'showMenuDetails'])->name('menu.details');
    Route::delete('/admin/destroy-menu/{id}', [AdminController::class, 'destroy'])->name('menu.destroy');

    Route::get('/admin/user-list', [UserController::class, 'index'])->name('admin.user-list');
    Route::delete('/admin/destroy-user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::post('/admin/activate-user/{id}', [UserController::class, 'activateUser'])->name('user.activate');
    Route::post('/admin/deactivate-user/{id}', [UserController::class, 'deactivateUser'])->name('user.deactivate');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/menu', [MenuController::class, 'index'])->name('user.menu');
    Route::post('/menu/add-to-order/{id}', [MenuController::class, 'addToOrder'])->name('menu.addToOrder');
    Route::get('/orders', [MenuController::class, 'showOrder'])->name('menu.showOrder');
    Route::post('/user-logout', [LoginController::class, 'logout'])->name('user.logout');

});