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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50)->index(); // 'page' or 'post'
            $table->string('title');
            $table->string('slug')->unique();
            $table->json('content_json'); // Editor.js JSON structure
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft')->index();
            $table->timestamp('published_at')->nullable()->index();

            // SEO fields (embedded - simpler than separate table)
            $table->string('meta_title', 60)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->string('canonical_url')->nullable();
            $table->string('og_title', 60)->nullable();
            $table->string('og_description', 160)->nullable();
            $table->string('og_type', 20)->default('article');

            // Authorship
            $table->foreignId('author_id')->constrained('users')->onDelete('restrict');

            $table->softDeletes();
            $table->timestamps();

            // Performance indexes
            $table->index(['type', 'status', 'published_at']);
            $table->index('author_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
