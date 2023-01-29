<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\MembershipController;

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

Route::get('/trainer', [TrainerController::class, 'display'])->name('trainer');
Route::post('/new-trainer', [TrainerController::class, 'create'])->name('new-trainer');
Route::get('/delete-trainer/{id}', [TrainerController::class, 'delete'])->name('delete-trainer');
Route::get('/edit-trainer/{id}', [TrainerController::class, 'edit'])->name('edit-trainer');
Route::post('/update-trainer', [TrainerController::class, 'update'])->name('update-trainer');

Route::get('/membership', [MembershipController::class, 'display'])->name('membership');
Route::post('/new-membership', [MembershipController::class, 'create'])->name('new-membership');
Route::get('/delete-membership/{id}', [MembershipController::class, 'delete'])->name('delete-membership');
Route::get('/edit-membership/{id}', [MembershipController::class, 'edit'])->name('edit-membership');
Route::post('/update-membership', [MembershipController::class, 'update'])->name('update-membership');