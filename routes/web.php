<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CekRole;
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

Route::get('/', [HomeController::class,"index"]);

Route::get('/users', [AdminController::class,"user"]);

Route::get('/deletemenu/{id}', [AdminController::class,"deletemenu"]);

Route::get('/foodmenu', [AdminController::class,"foodmenu"]);

Route::post('/uploadfood', [AdminController::class,"upload"]);

Route::get('/food', [HomeController::class,"food"]);

Route::get("/deleteuser/(id)", [AdminController::class,"deleteuser"]);

Route::post("/addcart/{id}", [HomeController::class,"addcart"]);

Route::get("/showcart/{id}", [HomeController::class,"showcart"]);

Route::get("/remove/{id}", [HomeController::class,"remove"]);

Route::get('/redirects', [HomeController::class,"redirects"]);

Route::post('/order', [HomeController::class,"order"]);

Route::get('/orders', [AdminController::class,"orders"]);

Route::get('/adminhome', [AdminController::class,"adminhome"]);

Route::get('/logout', [HomeController::class,"logout"]);

Route::get('/remove{id}', [HomeController::class,"logout"]);
 
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/transaksi', [AdminController::class,"transaksi"]);

Route::get('/detail{id}', [AdminController::class,"detail"])->name('detail');

Route::get('/kasirhome', [AdminController::class,"kasirhome"]);

Route::get('/laporan', [AdminController::class,"laporan"]);

