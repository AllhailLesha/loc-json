<?php

namespace App\Services\Document;

use App\Exceptions\Project\NotFoundException;
use App\Http\Resources\Document\DocumentResource;
use App\Models\Document;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class DocumentService
{

    private Project $project;

    public function setProject(Project|int $project): DocumentService
    {
        $this->project = $project instanceof Project
            ? $project
            : Project::query()->find($project);

        return $this;
    }


    public function store(array $data): DocumentService
    {
        $this->project->documents()->createMany($data);
        return $this;
    }

    /**
     * @throws NotFoundException
     */
    public function index(int $projectId)
    {
        $project = Project::query()->find($projectId);

        if (is_null($project))
        {
            throw new NotFoundException();
        }

        return DocumentResource::collection($project->documents()->get());
    }
}
