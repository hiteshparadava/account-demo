<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;


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


Route::get('/',[LoginController::class,'loginForm'])->name('admin.login');
Route::post('/login',[LoginController::class,'authenticate'])->name('admin.authenticate');
Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');


Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth:admin'])->name('admin.dashboard');
Route::get('/users',[DashboardController::class,'users'])->middleware(['auth:admin'])->name('admin.users');
Route::get('/users/{id}',[DashboardController::class,'usersDetail'])->middleware(['auth:admin'])->name('admin.user.detail');

Route::post('/users/{id}',[DashboardController::class,'updateUsersDetail'])->name('admin.user.detail.update');
Route::get('/user-documents/{id}',[DashboardController::class,'userDocuments'])->name('admin.user.documents');


//Route::resource('/document', DocumentController::class);

Route::get('/document',[DocumentController::class,'index'])->name('admin.document');

Route::get('/document-create',[DocumentController::class,'create'])->name('admin.document.create');
Route::post('/document-create',[DocumentController::class,'store'])->name('admin.document.store');

Route::get('/document-edit/{id}',[DocumentController::class,'edit'])->name('admin.document.edit');
Route::post('/document-update/{id}',[DocumentController::class,'update'])->name('admin.document.update');

Route::delete('/document-delete/{id}',[DocumentController::class,'destroy'])->name('admin.document.destroy');


Route::get('/document-download/{id}/{did}',[DashboardController::class,'downloadUserDocuments'])->name('admin.document.download');
Route::get('/all-document-download/{id}',[DashboardController::class,'downloadAllDocuments'])->name('admin.document.download.all');