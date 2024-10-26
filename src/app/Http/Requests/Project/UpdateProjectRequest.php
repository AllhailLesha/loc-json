<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:1000'],
            'languages' => ['nullable', 'array', 'required_array_keys:source,target'],
            'languages.source' => ['nullable', 'integer', 'exists:languages,id'],
            'languages.target' => ['nullable', 'array', 'max:10'],
            'languages.target*' => ['integer', 'exists:languages,id'],
            'settings.useMachineTranslate' => ['boolean'],
        ];
    }
}
