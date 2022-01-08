<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::name('website.')->prefix('website')->group(function () {
    Route::get('', [WebsiteController::class, 'index'])->name('index');
    Route::post('', [WebsiteController::class, 'store'])->name('store');

    Route::prefix('{website}')->group(function () {
        Route::get('', [WebsiteController::class, 'show'])->name('show');
        Route::post('', [WebsiteController::class, 'update'])->name('update');
        Route::patch('', [WebsiteController::class, 'update'])->name('update');
        Route::delete('', [WebsiteController::class, 'delete'])->name('delete');

        Route::name('post.')->prefix('post')->group(function () {
            Route::get('', [PostController::class, 'index'])->name('index');
            Route::post('', [PostController::class, 'store'])->name('store');
            Route::get('{post}', [PostController::class, 'show'])->name('show');
            Route::post('{post}', [PostController::class, 'update'])->name('update');
            Route::patch('{post}', [PostController::class, 'update'])->name('update');
            Route::delete('{post}', [PostController::class, 'delete'])->name('delete');
        });

        Route::post('subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
        Route::post('unsubscribe', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');
    });
});
