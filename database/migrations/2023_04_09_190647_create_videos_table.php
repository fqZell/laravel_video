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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();

            $table->string('title', 40);
            $table->text('description', 255);
            $table->string('poster', 255)->nullable()->default('public/images/default.jpg');
            $table->string('video_path')->default('public/images/default.jpg');
            $table->integer('view_count')->default(0);
            $table->boolean('is_published')->default(true);

            $table->foreignId('author_id')->constrained('users', 'id')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
