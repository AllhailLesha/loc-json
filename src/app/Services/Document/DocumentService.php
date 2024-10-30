<?php

namespace App\Services\Document;

use App\Exceptions\Project\NotFoundException;
use App\Http\Resources\Document\DocumentResource;
use App\Models\Document;
use App\Models\Project;
use App\Models\Translation;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class DocumentService
{

    private Project $project;
    private Document $document;

    public function setDocument(Document|int $document): DocumentService
    {
        $this->document = $document instanceof Document
            ? $document
            : Document::query()->find($document);
        return $this;
    }

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

    public function index(): Collection
    {
        return $this->project->documents()->get();
    }

    public function import(int $lang, array $translations)
    {
        $translatedData = [];

        $existingTranslation = Translation::query()
            ->where('language_id', $lang)
            ->where('document_id', $this->document->id)
            ->first();

        $sourceData = is_null($existingTranslation)
            ? $this->document->data
            : $existingTranslation->data;

        foreach ($sourceData as $item)
        {
            $targetItem = Arr::first($translations, function ($el) use ($item) {
               return $el['key'] === $item['key'];
            });

            if (is_null($targetItem))
            {
                if (is_null($existingTranslation))
                {
                    $item['value'] = '';
                }
                $translatedData[] = $item;
            } else
            {
                $item['value'] = $targetItem['value'];
                $translatedData[] = $item;
            }
        }
        Translation::query()->updateOrCreate([
            'document_id' => $this->document->id,
            'language_id' => $lang,
        ], [
            'data' => $translatedData
        ]);
    }
}
