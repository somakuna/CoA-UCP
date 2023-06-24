<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
Auth::routes();
Route::middleware(['auth', 'verified'])->group(function () 
{
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    # app
    Route::get('/app/management', [App\Http\Controllers\ApplicationController::class, 'index'])->name('application.index');
    Route::get('/app/create', [App\Http\Controllers\ApplicationController::class, 'create'])->name('application.create');
    Route::post('/app/store', [App\Http\Controllers\ApplicationController::class, 'store'])->name('application.store');
    Route::get('/app/show/{application}', [App\Http\Controllers\ApplicationController::class, 'show'])->name('application.show');
    Route::get('/app/edit/{application}', [App\Http\Controllers\ApplicationController::class, 'edit'])->name('application.edit');
    Route::get('/app/destroy/{application}', [App\Http\Controllers\ApplicationController::class, 'destroy'])->name('application.destroy');
    Route::put('/app/update/{application}', [App\Http\Controllers\ApplicationController::class, 'update'])->name('application.update');

    # app
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
    Route::get('/user/show/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    // Route::get('/app/create', [App\Http\Controllers\UserController::class, 'create'])->name('application.create');
    // Route::post('/app/store', [App\Http\Controllers\UserController::class, 'store'])->name('application.store');
    // Route::get('/app/show/{application}', [App\Http\Controllers\UserController::class, 'show'])->name('application.show');
    Route::get('/user/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    // Route::get('/app/destroy/{application}', [App\Http\Controllers\UserController::class, 'destroy'])->name('application.destroy');
    Route::put('/user/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

    # panel
    // Route::get('/app/create', [App\Http\Controllers\ApplicationController::class, 'create'])->name('panel.create');
    // Route::post('/app/store', [App\Http\Controllers\ApplicationController::class, 'store'])->name('panel.store');
    // Route::get('/app/show/{application}', [App\Http\Controllers\ApplicationController::class, 'show'])->name('panel.show');
    // Route::get('/app/edit/{application}', [App\Http\Controllers\ApplicationController::class, 'edit'])->name('panel.edit');
    // Route::get('/app/destroy/{application}', [App\Http\Controllers\ApplicationController::class, 'destroy'])->name('panel.destroy');
    // Route::put('/app/update/{application}', [App\Http\Controllers\ApplicationController::class, 'update'])->name('panel.update');

});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');