<?php

namespace App\Services\Account;

use App\Models\User;
use Illuminate\Support\Arr;

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
}
