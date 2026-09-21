<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('location_key')->default('tamara-1')->index();
            $table->string('code')->unique();
            $table->string('floor');
            $table->string('type');
            $table->unsignedInteger('price');
            $table->enum('status', ['available', 'occupied', 'reserved'])->default('available');
            $table->string('size');
            $table->json('features')->nullable();
            $table->string('image_url')->nullable();
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};