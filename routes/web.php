<?php

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/admin')->group(function () {
    Route::resource('/login', AdminAuthController::class);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

Route::group(['prefix' => '/dashboard', 'middleware' => ['auth:admin']], function () {
    Route::GET('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::GET('/', function () {
    return redirect('/login');
});

Route::resource('/media', MediaController::class);

Auth::routes();

Route::GET('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
Route::PUT('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');
Route::GET('/profile', [UserProfileController::class, 'show'])->name('profile.view');
