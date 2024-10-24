<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable =
        [
            'name',
            'description',
            'progress',
            'source_language_id',
            'target_language_ids',
            'documents',
            'performers',
            'settings',
        ];

    protected $casts = [
        'target_language_ids' => 'array',
        'documents' => 'array',
        'performers' => 'array'
    ];

    public function sourceLanguage(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'source_language_id');
    }

    public function targetLanguages(): Collection
    {
        return Language::query()
            ->where('id', $this->target_language_ids)
            ->get();
    }
}
