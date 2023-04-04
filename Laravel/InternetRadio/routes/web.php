<?php

use App\Http\Controllers\actieveRadioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\radioController;

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

Route::get('/', [actieveRadioController::class, 'index']);

Route::get('/volgende', [actieveRadioController::class, 'volgende']);

Route::get('/vorige', [actieveRadioController::class, 'vorige']);

Route::get('/upload', [RadioController::class, 'index'])->name('upload.index');

Route::get('/upload/create', [RadioController::class, 'create']);

Route::post('/upload', [RadioController::class, 'store'])->name('upload.store');

Route::get('/upload/{id}/edit', [RadioController::class, 'edit']);

Route::get('/radioOutput', [actieveRadioController::class, 'radioOutput']);