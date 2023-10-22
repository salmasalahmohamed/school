<?php

use App\Http\Controllers\parent\AuthenticatedSessionController;
use App\Http\Controllers\parent\ConfirmablePasswordController;
use App\Http\Controllers\parent\EmailVerificationNotificationController;
use App\Http\Controllers\parent\EmailVerificationPromptController;
use App\Http\Controllers\parent\NewPasswordController;
use App\Http\Controllers\parent\PasswordController;
use App\Http\Controllers\parent\PasswordResetLinkController;
use App\Http\Controllers\parent\RegisteredUserController;
use App\Http\Controllers\parent\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('parent')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('parent.register');

    Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

    Route::get('parent/login', [AuthenticatedSessionController::class, 'create'])
                ->name('parent.login');

    Route::post('parent/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:parente')->group(function () {
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
});
