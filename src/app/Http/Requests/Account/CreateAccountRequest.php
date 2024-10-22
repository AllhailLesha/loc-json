<?php

namespace App\Http\Requests\Account;

use App\Enums\AccountType;
use App\Facades\Account;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class CreateAccountRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'accountType' => ['required', 'string', Rule::enum(AccountType::class)],
            'companyName' => ['required_if:accountType,' . AccountType::LTD->value],
            'password' => ['required', 'required_array_keys:value,confirmation'],
            'password.value' => ['required', 'min:3', 'max:100'],
            'password.confirmation' => ['same:password.value'],
        ];
    }

    public function createAccount(): JsonResponse
    {
        Account::create($this->validated());
        return responseOk();
    }
}
