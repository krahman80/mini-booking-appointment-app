<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('calendar');
Route::get('/calendar/edit', [HomeController::class, 'edit'])->name('calendar.edit');
Route::post('calendar/show', [HomeController::class, 'show'])->name('calendar.show');
