<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [MenuController::class, 'index'])->name('home');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart');

Route::get('/menu-create', [MenuController::class, 'create'])->name('menu.create');


Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified', 'admin'])
->name('dashboard');

Route::post('/add-to-cart/{menu}', [CartController::class, 'addToCart'])->name('addToCart');

Route::post('/menu-create', [MenuController::class, 'store'])->name('menu.store');

Route::put('/dashboard/update/{menu}', [MenuController::class, 'update'])->name('menu.update');

Route::delete('/dashboard/delete/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::delete('/cart/delete/{cartItem}', [CartController::class, 'deleteCartItem'])->name('cart.delete');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
