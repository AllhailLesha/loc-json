<?php

namespace Database\Factories;

use App\Enums\DocumentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'data' => [
                [
                    'key' => fake()->word(),
                    'value' => fake()->text,
                ],
                [
                    'key' => fake()->word(),
                    'value' => fake()->text,
                ],
                [
                    'key' => fake()->word(),
                    'value' => fake()->text,
                ],
            ],
            'status' => fake()->randomElement(DocumentStatus::class),
            'progress' =>  round(fake()->randomFloat(max: 100), 1),
        ];
    }
}
