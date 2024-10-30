<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\DocumentController;
use App\Http\Middleware\Document\StoreDocumentMiddleware;
use App\Http\Middleware\Document\GetDocumentsMiddeleware;
use App\Http\Middleware\Document\DeleteDocumentMiddleware;

Route::controller(DocumentController::class)->prefix('v1/documents')->middleware( 'auth:sanctum')->group(function () {
    Route::get('/', 'index')
        ->name('documents.list')
        ->middleware(GetDocumentsMiddeleware::class);
    Route::get('/{documentId}', 'show')
        ->name('documents.show');
    Route::post('/', 'store')
        ->name('documents.store')
        ->middleware(StoreDocumentMiddleware::class);
    Route::post('/{document}/import', 'import')
        ->name('documents.import');
    Route::delete('/{document}', 'destroy')
        ->name('documents.destroy')
        ->middleware(DeleteDocumentMiddleware::class);
});

