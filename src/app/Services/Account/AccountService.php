<?php

namespace App\Services\Account;

use App\Exceptions\Account\InvalidUserCredentialsException;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    public function create(array $data): User
    {
        return User::query()->create([
            'name' => Arr::get($data, 'name'),
            'email' => Arr::get($data, 'email'),
            'account_type' => Arr::get($data, 'accountType'),
            'company_name' => Arr::get($data, 'companyName'),
            'password' => Arr::get($data, 'password.value'),
        ]);
    }

    public function signIn(string $email, string $password): string
    {
        $user = User::query()
            ->where('email', $email)
            ->first();

        if (!is_null($user))
        {
            if (Auth::attempt(['email' => $email, 'password' => $password]))
            {
                return $user->createToken('api-token')->plainTextToken;
            }
        }

        throw new InvalidUserCredentialsException();
    }
}
