<?php

namespace Database\Factories;

use App\Enums\DocumentStatus;
use App\Http\Resources\Languages\MinifiedLanguageResource;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Lang;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sourceId = Language::getRandomLanguageId();

        return [
            'name' => "OOO " . fake()->text(5),
            'description' => fake()->text,
            'progress' =>  round(fake()->randomFloat(max: 100), 1),
            'source_language_id' => $sourceId,
            'target_language_ids' => Language::getRandomLanguageIds($sourceId),
            'documents' => [
                'id' => fake()->randomNumber(),
                'name' => 'article' . fake()->randomNumber() . '.json',
                'status' => fake()->randomElement(DocumentStatus::class),
                'progress' => fake()->randomFloat(100),
            ],
            'performers' => [
                'id' => fake()->randomNumber(),
                "name" => "Ivan Ivanov",
                "email" => "ivan@yandex.ru",
                "addedAt" => "25-12-2022 18:12"
            ],
            'settings' => fake()->boolean,
        ];
    }
}
