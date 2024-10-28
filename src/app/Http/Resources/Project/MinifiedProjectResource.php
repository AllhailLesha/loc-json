<?php

namespace App\Http\Resources\Project;

use App\Facades\Projects;
use App\Http\Resources\Languages\MinifiedLanguageResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedProjectResource extends JsonResource
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
            'languages' => [
                'source' => new MinifiedLanguageResource($this->sourceLanguage),
                'target' => MinifiedLanguageResource::collection($this->targetLanguages()),
            ],
            'documents' => $this->documents,
            'useMachineTranslate' => $this->settings,
            'createdAt' => Carbon::parse($this->create_at)->format('Y-m-d H:i'),
        ];
    }
}
