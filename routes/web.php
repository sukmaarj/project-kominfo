<?php


use App\Models\Admin;
use App\Models\User;
use App\Models\Status;
use App\Models\Action;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardFormController;
use App\Http\Controllers\DashboardDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProfileController;


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

Route::get('/', [LoginController::class, 'index'])->middleware('guest');


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::prefix('dashboard')->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');
    Route::get('/admin/create', [AdminController::class, 'create'])->middleware('auth');;
    Route::post('/admin', [AdminController::class, 'store']);
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name("admin.edit");
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name("admin.update");
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name("admin.destroy");
    Route::get('/admin/{id}/change-password', [AdminController::class, 'editPassword'])->name('admin.editPassword');
    Route::put('/admin/{id}/update-password', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
});

Route::resource('/dashboard/form', DashboardFormController::class)->except('show')->middleware('auth');

Route::resource('/dashboard/data', DashboardDataController::class)->except('show')->middleware('auth');

Route::get('/dashboard/status', [StatusController::class, 'index'])->middleware('auth');
Route::get('/dashboard/status/{id}', [StatusController::class, 'accept']);
Route::get('/dashboard/status/{id}', [StatusController::class, 'decline']);
Route::get('/dashboard/status/edit/{id}', [StatusController::class, 'edit'])->name("status.edit");
Route::put('/dashboard/status/{id}', [StatusController::class, 'update'])->name("status.update");
Route::delete('/dashboard/status/{id}', [StatusController::class, 'destroy'])->name("status.destroy");


Route::get('/dashboard/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/dashboard/profile/edit/{id}', [ProfileController::class, 'edit'])->name("profile.edit");
Route::put('/dashboard/profile/{id}', [ProfileController::class, 'update'])->name("profile.update");


