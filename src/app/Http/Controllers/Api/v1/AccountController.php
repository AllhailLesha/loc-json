<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateAccountRequest;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    public function create(CreateAccountRequest $request): JsonResponse
    {
       return $request->createAccount();
    }
}
