<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $positions = [
            'A-01' => 3, 'A-02' => 7, 'A-03' => 9, 'A-04' => 4,
            'B-01' => 8, 'B-02' => 10, 'B-03' => 12, 'B-04' => 13,
            'L-01' => 1, 'L-02' => 2, 'L-03' => 5, 'L-04' => 6,
            'VIP-01' => 11, 'D-01' => 14,
            'E-01' => 1, 'E-02' => 2, 'E-03' => 5, 'E-04' => 6,
            'F-01' => 3, 'F-02' => 7, 'F-03' => 9, 'VIP-02' => 11,
            'G-01' => 4, 'G-02' => 8, 'G-03' => 10, 'G-04' => 12, 'G-05' => 13, 'G-06' => 14,
        ];

        foreach ($positions as $code => $position) {
            DB::table('rooms')->where('code', $code)->update(['position' => $position]);
        }

        DB::table('rooms')->where('location_key', 'tamara-1')->whereIn('code', ['A-01', 'A-02', 'A-03', 'A-04', 'B-01', 'B-02', 'B-03', 'B-04', 'L-01', 'L-02', 'L-03', 'L-04', 'VIP-01', 'D-01'])->update(['floor' => 'Lantai 1']);
        DB::table('rooms')->where('location_key', 'tamara-1')->whereIn('code', ['E-01', 'E-02', 'E-03', 'E-04', 'F-01', 'F-02', 'F-03', 'VIP-02', 'G-01', 'G-02', 'G-03', 'G-04', 'G-05', 'G-06'])->update(['floor' => 'Lantai 2']);
    }

    public function down(): void
    {
        // Position values are application layout data and are intentionally not reversed.
    }
};