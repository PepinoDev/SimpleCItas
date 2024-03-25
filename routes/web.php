<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'base'])->name('base');
// Route::get('/{post:date}', [HomeController::class, 'cita'])->name('cita');
Route::get('/cita{id}', [HomeController::class, 'cita'])->name('cita');
Route::post('/correo', [HomeController::class, 'correo'])->name('correo');