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
        Schema::table('contents', function (Blueprint $table) {
            // Template identifier (null = no template, uses Editor.js)
            $table->string('template', 50)->nullable()->after('type');

            // JSON structure for template sections
            $table->json('template_data')->nullable()->after('content_json');

            // Index for querying by template
            $table->index('template');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropIndex(['template']);
            $table->dropColumn(['template', 'template_data']);
        });
    }
};
