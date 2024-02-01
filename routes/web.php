<?php

use App\Http\Controllers\Comments;
use App\Http\Controllers\Issues;
use App\Http\Controllers\Register;
use App\Models\Comment;
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

Route::get('/register', [Register::class, 'index'])->name('registerIndex');
Route::post('/register', [Register::class, 'create'])->name('registerCreate');
Route::post('/register/login', [Register::class, 'login'])->name('login');
Route::get('/register/logout', [Register::class, 'logout'])->name('logout');

Route::get('/issue/create', [Issues::class, 'showForm'])->name('createIssue');
Route::post('/issue/create', [Issues::class, 'create']);
Route::get('/issues',[Issues::class, 'index']);
Route::get('/issue/{id}', [Issues::class, 'show'])->name('showIssue');
Route::post('/issue/close/{id}', [Issues::class, 'close'])->name('closeIssue');

Route::post('/comment', [Comments::class, 'create'])->name('addComment');
