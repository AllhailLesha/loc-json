<?php

namespace App\Services\Project;

use App\Models\Project;
use Illuminate\Support\Arr;

class ProjectService
{
    public static function create(array $data): Project
    {
        return Project::query()->create([
            'name' => Arr::get($data, 'name'),
            'description' => Arr::get($data, 'description'),
            'progress' => 0,
            'source_language_id' => Arr::get($data, 'languages.source'),
            'target_language_ids' => Arr::get($data, 'languages.target'),
            'documents' => [],
            'performers' => [],
            'settings' => Arr::get($data, 'settings.useMachineTranslate')
        ]);
    }
}
