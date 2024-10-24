<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ProjectController;

Route::prefix('v1/')->group(function (){
    Route::apiResource('projects', ProjectController::class)->middleware('auth:sanctum');
});


