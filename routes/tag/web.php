<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

// Route::get('/feeds', function () { return view('pages.feed.index'); })->name('feeds');
Route::middleware(['auth','log-request'])->group(function(){
    Route::get('/tags', [TagController::class, 'index'])->name('tags');

    Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');

    // Route::get('/feed/show/{feed}', [FeedController::class, 'show'])->name('feed.show');
    // Route::put('/feed/update/{feed}', [FeedController::class, 'update'])->name('feed.update');

    // Route::get('/feeds/user', [FeedController::class, 'userFeeds'])->name('feeds.user');
});
