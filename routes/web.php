<?php

use App\Http\Controllers\Issues;
use Illuminate\Support\Facades\Route;

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

Route::get('/issue/create', [Issues::class, 'showForm'])->name('createIssue');
Route::post('/issue/create', [Issues::class, 'create']);
Route::get('/issues',[Issues::class, 'index']);
Route::get('/issue/{id}', [Issues::class, 'show'])->name('showIssue');