<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateAccountRequest;
use App\Http\Requests\Account\SignInAccountRequest;
use App\Http\Resources\Account\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    public function create(CreateAccountRequest $request): JsonResponse
    {
       return $request->createAccount();
    }

    public function signIn(SignInAccountRequest $request): array
    {
        return [
            "token" => $request->signIn()
        ];
    }

    public function show(): UserResource
    {
        return new UserResource(
            auth()->user()
        );
    }
}
