<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('location_key')->index();
            $table->string('author');
            $table->decimal('rating', 2, 1)->nullable();
            $table->string('relative_time')->nullable();
            $table->text('text');
            $table->string('source')->default('Google Maps');
            $table->string('source_url')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->unique(['location_key', 'author', 'text']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
