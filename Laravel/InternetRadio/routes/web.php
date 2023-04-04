<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/upload', [RadioController::class, 'index']);

Route::get('/upload/create', [RadioController::class, 'create']);

Route::post('/upload', [RadioController::class, 'store']);

Route::get('/upload/{id}/edit', [RadioController::class, 'edit']);