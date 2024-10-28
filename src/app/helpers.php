<?php

function responseOk(): \Illuminate\Http\JsonResponse
{
    return response()->json([
        'status' => 'success',
    ]);
}

function responseCreated(): \Illuminate\Http\JsonResponse
{
    return response()->json([
        'status' => 'success'
    ], 201);
}
