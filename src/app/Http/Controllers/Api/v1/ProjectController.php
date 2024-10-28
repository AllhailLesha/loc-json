<?php

namespace App\Http\Controllers\Api\v1;

use App\Facades\Projects;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Project\ProjectAccessMiddleware;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\Project\MinifiedProjectResource;
use App\Http\Resources\Project\ProjectResource;
use App\Models\Project;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class ProjectController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return MinifiedProjectResource::collection(Project::query()
            ->where('user_id', auth()->id())
            ->get());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        return $request->createProject();
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $projects)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        return new ProjectResource(
            Projects::setProject($project)->update($request->validated())
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return responseOk();
    }

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: ProjectAccessMiddleware::class, only: ['update', 'destroy'])
        ];
    }
}
