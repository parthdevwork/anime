<?php

use App\Http\Controllers\AnimeController;
use Illuminate\Support\Facades\Route;

Route::post('import-anime', [AnimeController::class, 'importAnimeData'])->name('ImportAnimm')->middleware('throttle:importAnimeData');

Route::get('anime/{slug}', [AnimeController::class, 'getAnimeBySlug'])->middleware('throttle:getAnimeBySlug');
