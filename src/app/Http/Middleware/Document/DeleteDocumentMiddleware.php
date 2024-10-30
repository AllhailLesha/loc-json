<?php

namespace App\Http\Middleware\Document;

use App\Exceptions\Account\NotAccessToOperationException;
use App\Exceptions\Document\NotFoundException;
use App\Models\Document;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteDocumentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws NotFoundException
     * @throws NotAccessToOperationException
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Project $project
         * @var Document $document
         */

        $document = $request->route('document');
        $project = $document->project()->first();

        if (!$project->hasAccess())
        {
            throw new NotAccessToOperationException();
        }

        return $next($request);
    }
}
