<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\RegisterController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\CompanyController;
use App\Http\Controllers\Front\DirectorController;





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
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[LoginController::class,'loginForm'])->name('login');
Route::post('/login',[LoginController::class,'authenticate'])->name('authenticate');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[RegisterController::class,'registerForm'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('store');

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
Route::get('/profile',[UserController::class,'index'])->middleware(['auth'])->name('user.profile');
Route::post('/profile',[UserController::class,'updateProfile'])->middleware(['auth'])->name('user.detail.update');

Route::get('/documents',[UserController::class,'documents'])->middleware(['auth'])->name('user.documents');

Route::get('/document-download/{id}',[UserController::class,'downloadDocument'])->name('user.document.download');
Route::get('/all-document-download',[UserController::class,'downloadDocumentAll'])->name('user.document.download.all');



Route::get('/company',[CompanyController::class,'index'])->middleware(['auth'])->name('user.company');
Route::get('/company-create',[CompanyController::class,'create'])->middleware(['auth'])->name('user.company.create');
Route::post('/company-create',[CompanyController::class,'store'])->middleware(['auth'])->name('user.company.store');


Route::get('/director/{company_id}',[DirectorController::class,'index'])->middleware(['auth'])->name('user.director');
Route::get('/director-create/{company_id}',[DirectorController::class,'create'])->middleware(['auth'])->name('user.director.create');
Route::post('/director-create',[DirectorController::class,'store'])->middleware(['auth'])->name('user.director.store');