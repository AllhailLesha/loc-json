<?php

namespace App\Facades;


use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\Project\DocumentService
 *
 * @method static \App\Services\Document\DocumentService setProject(Project|int $project)
 * @method static \App\Services\Document\DocumentService store(array $data)
 * @method static array index(int $projectId)
 */
class Documents extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'documents';
    }
}
