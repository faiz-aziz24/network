<?php

use App\Http\Controllers\ExploreUserController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\UpdateProfileInformationController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', WelcomeController::class);

Route::get('about', function () {
    return view('about');
})->name('about');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('timeline', TimelineController::class)->name('timeline');



    Route::prefix('status')->group(function () {
        Route::post('store', [StatusController::class, 'store'])->name('statuses.store');
        Route::post('{status}/destroy', [StatusController::class, 'destroy'])->name('statuses.destroy');
        Route::get('{status}/edit', [StatusController::class, 'edit'])->name('statuses.edit');
        Route::put('{status}/update', [StatusController::class, 'update'])->name('statuses.update');
    });


    Route::get('explore', ExploreUserController::class)->name('users.index');

    Route::prefix('profile')->group(function () {
        Route::get('edit', [UpdateProfileInformationController::class, 'edit'])->name('profile.edit');
        Route::put('update', [UpdateProfileInformationController::class, 'update'])->name('profile.update');

        Route::get('password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
        Route::put('password/update', [UpdatePasswordController::class, 'update'])->name('password.change');

        Route::get('{user}/{following}', FollowingController::class)->name('following.index');
        Route::post('{user}', [FollowingController::class, 'store'])->name('following.store');

        Route::get('{user}', ProfileInformationController::class)->name('profile')->withoutMiddleware(['auth', 'verified']);
    });
});

require __DIR__ . '/auth.php';
