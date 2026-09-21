<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('rooms') && ! Schema::hasColumn('rooms', 'location_key')) {
            Schema::table('rooms', function (Blueprint $table) {
                $table->string('location_key')->default('tamara-1')->after('id')->index();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('rooms') && Schema::hasColumn('rooms', 'location_key')) {
            Schema::table('rooms', function (Blueprint $table) {
                $table->dropColumn('location_key');
            });
        }
    }
};