<?php

namespace App\Facades;

use App\Http\Requests\Account\CreateAccountRequest;
use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\Account\AccountService
 *
 * @method static \App\Models\User create(array $data)
 * @method static string signIn(string $email, string $password)
 */

class Account extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'account_service';
    }
}
