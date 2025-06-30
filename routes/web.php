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
Route::get('/filter', [ManageController::class, 'welcome'])->name('welcome'); //ฟิลเตอร์




Route::get('/add-Member', [ManageController::class, 'addMember'])->name('addMember');
Route::get('/report', [ManageController::class, 'report'])->name('report');
Route::get('/Member-detail/{id}', [ManageController::class, 'detailMember'])->name('detailMember');
Route::put('/Member-detail-updated/{id}', [ManageController::class, 'updateMember'])->name('updateMember');
Route::delete('/Member-detail-delete/{id}', [ManageController::class, 'deleteMember'])->name('deleteMember');


Route::post('/add-Member/save', [ManageController::class, 'addMemberSaved'])->name('addMemberSaved');
