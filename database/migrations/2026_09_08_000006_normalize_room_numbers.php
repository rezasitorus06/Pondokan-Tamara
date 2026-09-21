<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropUnique('rooms_code_unique');
            $table->unique(['location_key', 'floor', 'code']);
        });

        $floorOne = [1 => '23', 2 => '22', 3 => '14', 4 => '1', 5 => '21', 6 => '20', 7 => '15', 8 => '2', 9 => '16', 10 => '3', 11 => 'Rumah penjaga kos', 12 => '4', 13 => '5', 14 => '6'];
        $floorTwo = [1 => '27', 2 => '26', 3 => '17', 4 => '7', 5 => '25', 6 => '24', 7 => '18', 8 => '8', 9 => '19', 10 => '9', 11 => 'VIP', 12 => '10', 13 => '11', 14 => '12'];

        foreach (DB::table('rooms')->where('location_key', 'tamara-1')->get() as $room) {
            $numbers = $room->floor === 'Lantai 2' ? $floorTwo : $floorOne;
            if (isset($numbers[$room->position])) {
                DB::table('rooms')->where('id', $room->id)->update(['code' => $numbers[$room->position]]);
            }
        }

        foreach (DB::table('rooms')->where('location_key', 'tamara-2')->get() as $room) {
            DB::table('rooms')->where('id', $room->id)->update(['code' => (string) $room->position]);
        }
    }

    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropUnique('rooms_location_key_floor_code_unique');
            $table->unique('code');
        });
    }
};