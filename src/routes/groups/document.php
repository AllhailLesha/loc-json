<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\DocumentController;
use App\Http\Middleware\Document\StoreDocumentMiddleware;

Route::controller(DocumentController::class)->prefix('v1/documents')->group(function () {
    Route::get('/', 'index')->name('documents.list');
    Route::post('/', 'store')
        ->name('documents.store')
        ->middleware(StoreDocumentMiddleware::class, 'auth:sanctum');
});

