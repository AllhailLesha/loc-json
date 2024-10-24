<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\LanguageFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Language::factory(10)->create();

        $this->call([
            ProjectsSeeder::class
        ]);
    }
}
