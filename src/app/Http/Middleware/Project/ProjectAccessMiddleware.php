<?php

namespace App\Http\Middleware\Project;

use App\Exceptions\Account\NotAccessToOperationException;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws NotAccessToOperationException
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Project  $project
         */
        $project = $request->route('project');
        if (!$project->hasAccess())
        {
            throw new NotAccessToOperationException();
        }
        return $next($request);
    }
}
