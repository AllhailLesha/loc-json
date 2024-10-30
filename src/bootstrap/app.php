<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Exceptions\Account\InvalidUserCredentialsException;
use App\Exceptions\Account\NotAccessToOperationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (InvalidUserCredentialsException $e){
           return response()->json([
               "status"=> false,
              "message" => __('exceptions.InvalidUserCredentials')
           ], 401);
        });
        $exceptions->render(function (NotAccessToOperationException $e){
         return response()->json([
            'status' => false,
            'message' =>  __('exceptions.NotAccessToOperation')
         ], 403);
        });
        $exceptions->render(function (\App\Exceptions\Document\NotFoundException $e){
            return response()->json([
                'status' => false,
                'message' =>  __('exceptions.DocumentNotFoundException')
            ], 404);
        });
        $exceptions->render(function (\App\Exceptions\Project\NotFoundException $e){
            return response()->json([
                'status' => false,
                'message' =>  __('exceptions.ProjectNotFoundException')
            ], 404);
        });
    })->create();
