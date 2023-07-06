<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::prefix('')->group(function () {
    Route::get('/', [App\Http\Controllers\User\GetController::class, 'index'])->name('user.index');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});
Route::prefix('vendeur')->group(function () {

});
Route::get('Login_Vendeur', [LoginController::class, 'ShowloginVendor'])->name('Vendor.login.show');
Route::post('Login_Vendeur', [LoginController::class, 'loginVendor'])->name('Vendor.login.submit');
