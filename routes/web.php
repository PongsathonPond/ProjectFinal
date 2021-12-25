<?php

use App\Http\Controllers\routeController;
use App\Http\Controllers\UserManagerController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/index', [routeController::class, 'index'])->name('index');

    Route::get('/UserManager', [UserManagerController::class, 'index'])->name('UserManager');
    Route::get('/UserManager/edit/{id}', [UserManagerController::class, 'edit'])->name('UserManagerEdit');
    Route::post('/UserManager/update/{id}', [UserManagerController::class, 'update']);
    Route::get('/UserManager/delete/{id}', [UserManagerController::class, 'delete']);

    Route::get('/Addasccessory/', [AsccessoryController::class, 'index'])->name('Addasccessory');
    Route::post('/Addasccessory/add', [AsccessoryController::class, 'store'])->name('Additem');
    Route::get('/Addasccessory/edit/{id}', [AsccessoryController::class, 'edit'])->name('editAddasccessory');
    Route::post('/Addasccessory/update/{id}', [AsccessoryController::class, 'update']);
    Route::get('/Addasccessory/delete/{id}', [AsccessoryController::class, 'delete']);

});
