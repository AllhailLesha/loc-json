<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Language extends Model
{
    /** @use HasFactory<\Database\Factories\LanguageFactory> */
    use HasFactory;

    protected $fillable =
        [
            'name',
            'locale',
        ];

    public static function getRandomLanguageId(): int
    {
        return self::query()->inRandomOrder()->first()->id;
    }

    public static function getRandomLanguageIds(int $id): array
    {
        return self::query()
            ->select('id')
            ->where('id', '!=', $id)
            ->inRandomOrder()->limit(3)
            ->get()
            ->map(function ($el){
                return $el->id;
            })
            ->toArray();
    }

}
