<?php

use App\Http\Controllers\student\AuthenticatedSessionController;
use App\Http\Controllers\student\ConfirmablePasswordController;
use App\Http\Controllers\student\EmailVerificationNotificationController;
use App\Http\Controllers\student\EmailVerificationPromptController;
use App\Http\Controllers\student\NewPasswordController;
use App\Http\Controllers\student\PasswordController;
use App\Http\Controllers\student\PasswordResetLinkController;
use App\Http\Controllers\student\RegisteredUserController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\student\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('student')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('student.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('student.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:student')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    Route::get('student/index',[StudentController::class,'index']);

});
