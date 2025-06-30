<?php

use App\Http\Controllers\ManageController;
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


Route::get('/', [ManageController::class, 'welcome'])->name('welcome');
Route::get('/add-Member', [ManageController::class, 'addMember'])->name('addMember');
Route::post('/add-Member/save', [ManageController::class, 'addMemberSaved'])->name('addMemberSaved');
