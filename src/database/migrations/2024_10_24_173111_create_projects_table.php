<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->tinyText('description')->nullable();
            $table->float('progress')->nullable()->default(0);
            $table->foreignId('source_language_id')
                ->constrained('languages')
                ->cascadeOnDelete();
            $table->json('target_language_ids')->nullable();
            $table->json('documents')->nullable();
            $table->json('performers')->nullable();
            $table->boolean('settings')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
