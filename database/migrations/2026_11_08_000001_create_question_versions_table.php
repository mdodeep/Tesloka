<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_versions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            $table->integer('version_number')->index();
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->jsonb('snapshot');
            $table->string('change_summary')->nullable();
            $table->timestamp('created_at')->useCurrent();

            $table->unique(['question_id', 'version_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_versions');
    }
};
