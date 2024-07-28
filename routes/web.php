<?php

use App\Http\Controllers\ClientSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MenuManagementController;
use App\Http\Controllers\PalikaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SystemSettingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(url('/login'));
});

Auth::routes();
Route::get('/app', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('clientsetting', ClientSettingController::class);
    Route::resource('systemsetting', SystemSettingController::class);
    Route::resource('menumanagement', MenuManagementController::class);
    Route::post('menumanagement/update-order', [MenuManagementController::class, 'updateOrder'])->name('menus.updateOrder');
    Route::post('menumanagement/post-menu', [MenuManagementController::class, 'postSaveMenu'])->name('menus.postsave');

    Route::get('language/{locale}', [LocaleController::class, 'toggleLanguage']);

    Route::resource('palikas', PalikaController::class);
});
