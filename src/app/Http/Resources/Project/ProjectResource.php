<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\Languages\MinifiedLanguageResource;
use App\Models\Language;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'progress' => $this->progress,
            'languages' => [
                'source' => new MinifiedLanguageResource($this->sourceLanguage),
                'target' => MinifiedLanguageResource::collection($this->targetLanguages()),
            ],
            'documents' => $this->documents,
            'performers' => $this->performers,
            'settings' => [
                'useMachineTranslate' => $this->settings,
            ],

            'createdAt' => \Illuminate\Support\Facades\Date::now()->format('Y-m-d'),
        ];
    }
}
