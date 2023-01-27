<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

Route::get('/', [MemberController::class, 'display'])->name('index');

Route::post('/new-member', [MemberController::class, 'create'])->name('new-member');

Route::get('/delete-member/{id}', [MemberController::class, 'delete'])->name('delete-member');

Route::get('/edit-member/{id}', [MemberController::class, 'edit'])->name('edit-member');

Route::post('/update-member', [MemberController::class, 'update'])->name('update-member');