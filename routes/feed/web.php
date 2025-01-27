<?php

use App\Http\Controllers\FeedController;

use Illuminate\Support\Facades\Route;

// Route::get('/feeds', function () { return view('pages.feed.index'); })->name('feeds');
Route::middleware(['auth','log-request'])->group(function(){
    Route::get('/feeds', [FeedController::class, 'index'])->name('feeds');

    Route::get('/feed/create', [FeedController::class, 'create'])->name('feed.create');
    Route::post('/feed/store', [FeedController::class, 'store'])->name('feed.store');

    Route::get('/feed/show/{feed}', [FeedController::class, 'show'])->name('feed.show');
    Route::put('/feed/update/{feed}', [FeedController::class, 'update'])->name('feed.update');

    Route::get('/feeds/user', [FeedController::class, 'userFeeds'])->name('feeds.user');
});
//Route::get('/ai/feed', [AIController::class, 'generateFeedContent'])->name('ai.feed');
