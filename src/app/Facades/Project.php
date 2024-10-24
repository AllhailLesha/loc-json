<?php

namespace App\Facades;


/**
 * @see \App\Services\Account\AccountService
 *
 * @method static \App\Models\Project create(array $data)
 */
class Project
{
    protected static function getFacadeAccessor(): string
    {
        return 'project_service';
    }
}
