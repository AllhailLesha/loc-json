<?php

namespace Database\Factories;

use App\Enums\DocumentStatus;
use App\Http\Resources\Languages\MinifiedLanguageResource;
use App\Models\Document;
use App\Models\Language;
use App\Models\Project;
use App\Models\User;
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
        $project = new Project();
        return [
            'name' => "OOO " . fake()->text(5),
            'description' => fake()->text,
            'progress' =>  round(fake()->randomFloat(max: 100), 1),
            'source_language_id' => $sourceId,
            'target_language_ids' => Language::getRandomLanguageIds($sourceId),
            'settings' => fake()->boolean,
        ];
    }
}
