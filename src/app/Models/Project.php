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
            'user_id',
            'document_ids',
            'performer_ids',
            'settings',
        ];

    protected $casts = [
        'target_language_ids' => 'array',
        'document_ids' => 'array',
        'performer_ids' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

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
