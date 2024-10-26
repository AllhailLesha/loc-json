<?php

namespace App\Services\Project;

use App\Models\Project;
use Illuminate\Support\Arr;

class ProjectService
{
    private Project $project;

    public function setProject(Project $project): ProjectService
    {
        $this->project = $project;
        return $this;
    }


    public function create(array $data): Project
    {
        return Project::query()->create([
            'name' => Arr::get($data, 'name'),
            'description' => Arr::get($data, 'description'),
            'progress' => 0,
            'source_language_id' => Arr::get($data, 'languages.source'),
            'target_language_ids' => Arr::get($data, 'languages.target'),
            'user_id' => auth()->id(),
            'document_ids' => [],
            'performer_ids' => [],
            'settings' => Arr::get($data, 'settings.useMachineTranslate')
        ]);
    }

    public function update (array $data): Project
    {
         $this->project
             ->update($this->mapProjectData($data));

         return $this->project;
    }

    private function mapProjectData(array $data): array
    {

        $mappedData = [];

        $dotArray = Arr::dot($data);

        foreach ($dotArray as $key => $value)
        {
            $mappedData[$this->getTableField($key)] = $value;
        }

        return $mappedData;
    }

    private function getTableField(string $key): string
    {
        $fields = [
            'name' => 'name',
            'description' => 'description',
            'languages.source' => 'source_language_id',
            'languages.target' => 'target_language_ids',
            'documents' => 'document_ids',
            'performers' => 'performer_ids',
            'settings.useMachineTranslate' => 'settings'
        ];

        return $fields[$key];
    }
}
