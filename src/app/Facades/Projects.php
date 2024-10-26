<?php

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\Project\ProjectService
 *
 * @method static \App\Models\Project create(array $data)
 * @method static \App\Services\Project\ProjectService setProject(\App\Models\Project $project)
 */
class Projects extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'projects';
    }
}
