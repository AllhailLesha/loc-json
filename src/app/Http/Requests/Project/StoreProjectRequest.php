<?php

namespace App\Http\Requests\Project;

use App\Facades\Projects;
use App\Http\Resources\Project\ProjectResource;
use App\Services\Project\ProjectService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class StoreProjectRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:1000'],
            'languages' => ['required', 'array', 'required_array_keys:source,target'],
            'languages.source' => ['required', 'integer', 'exists:languages,id'],
            'languages.target' => ['required', 'array', 'max:10'],
            'languages.target*' => ['integer', 'exists:languages,id'],
            'settings.useMachineTranslate' => ['boolean'],
        ];
    }

    public function createProject(): ProjectResource
    {
        return new ProjectResource(
            Projects::create($this->validated())
        );
    }
}
