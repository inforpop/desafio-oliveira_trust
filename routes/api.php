<?php

Route::post('/upload', [UploadController::class, 'upload']);
Route::get('/upload-history', [UploadController::class, 'history']);
Route::get('/search', [UploadController::class, 'search']);
