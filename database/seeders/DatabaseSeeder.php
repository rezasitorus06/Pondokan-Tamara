<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@pondokantamara.test'], [
            'name' => 'Admin Pondokan Tamara',
            'password' => 'tamara-admin-2026',
        ]);

        Room::query()->delete();

        foreach ([
            ['location_key' => 'tamara-1', 'code' => 'A-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 1],
            ['location_key' => 'tamara-1', 'code' => 'A-02', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 2],
            ['location_key' => 'tamara-1', 'code' => 'A-03', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1200000, 'status' => 'reserved', 'size' => '4 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 3],
            ['location_key' => 'tamara-1', 'code' => 'A-04', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1200000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 4],
            ['location_key' => 'tamara-1', 'code' => 'B-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '3 x 3 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 5],
            ['location_key' => 'tamara-1', 'code' => 'B-02', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1200000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 6],
            ['location_key' => 'tamara-1', 'code' => 'B-03', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'reserved', 'size' => '3 x 3 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 7],
            ['location_key' => 'tamara-1', 'code' => 'B-04', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1200000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 8],
            ['location_key' => 'tamara-1', 'code' => 'L-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 9],
            ['location_key' => 'tamara-1', 'code' => 'L-02', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 10],
            ['location_key' => 'tamara-1', 'code' => 'L-03', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 11],
            ['location_key' => 'tamara-1', 'code' => 'L-04', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'reserved', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 12],
            ['location_key' => 'tamara-1', 'code' => 'VIP-01', 'floor' => 'Lantai 1', 'type' => 'VIP', 'price' => 1500000, 'status' => 'available', 'size' => '4 x 6 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 13],
            ['location_key' => 'tamara-1', 'code' => 'D-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 14],
            ['location_key' => 'tamara-1', 'code' => 'E-01', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 1],
            ['location_key' => 'tamara-1', 'code' => 'E-02', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 2],
            ['location_key' => 'tamara-1', 'code' => 'E-03', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 3],
            ['location_key' => 'tamara-1', 'code' => 'E-04', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'reserved', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 4],
            ['location_key' => 'tamara-1', 'code' => 'F-01', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 5],
            ['location_key' => 'tamara-1', 'code' => 'F-02', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 6],
            ['location_key' => 'tamara-1', 'code' => 'F-03', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 7],
            ['location_key' => 'tamara-1', 'code' => 'VIP-02', 'floor' => 'Lantai 2', 'type' => 'VIP', 'price' => 1500000, 'status' => 'available', 'size' => '4 x 6 m', 'features' => ['Wi-Fi'], 'position' => 8],
            ['location_key' => 'tamara-1', 'code' => 'G-01', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 9],
            ['location_key' => 'tamara-1', 'code' => 'G-02', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'reserved', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 10],
            ['location_key' => 'tamara-1', 'code' => 'G-03', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 11],
            ['location_key' => 'tamara-1', 'code' => 'G-04', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 12],
            ['location_key' => 'tamara-1', 'code' => 'G-05', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'occupied', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 13],
            ['location_key' => 'tamara-1', 'code' => 'G-06', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 14],
            ['location_key' => 'tamara-2', 'code' => 'C-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 900000, 'status' => 'available', 'size' => '3 x 3 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 1],
            ['location_key' => 'tamara-2', 'code' => 'C-02', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 900000, 'status' => 'occupied', 'size' => '3 x 3 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 2],
            ['location_key' => 'tamara-2', 'code' => 'C-03', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1150000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 3],
            ['location_key' => 'tamara-2', 'code' => 'C-04', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1150000, 'status' => 'reserved', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 4],
        ] as $room) {
            Room::create($room);
        }

        foreach ([
            'A-01' => 3, 'A-02' => 7, 'A-03' => 9, 'A-04' => 4,
            'B-01' => 8, 'B-02' => 10, 'B-03' => 12, 'B-04' => 13,
            'L-01' => 1, 'L-02' => 2, 'L-03' => 5, 'L-04' => 6,
            'VIP-01' => 11, 'D-01' => 14,
            'E-01' => 1, 'E-02' => 2, 'E-03' => 5, 'E-04' => 6,
            'F-01' => 3, 'F-02' => 7, 'F-03' => 9, 'VIP-02' => 11,
            'G-01' => 4, 'G-02' => 8, 'G-03' => 10, 'G-04' => 12, 'G-05' => 13, 'G-06' => 14,
        ] as $code => $position) {
            Room::where('code', $code)->update(['position' => $position]);
        }

        $floorOneNumbers = [1 => '23', 2 => '22', 3 => '14', 4 => '1', 5 => '21', 6 => '20', 7 => '15', 8 => '2', 9 => '16', 10 => '3', 11 => 'Rumah penjaga kos', 12 => '4', 13 => '5', 14 => '6'];
        $floorTwoNumbers = [1 => '27', 2 => '26', 3 => '17', 4 => '7', 5 => '25', 6 => '24', 7 => '18', 8 => '8', 9 => '19', 10 => '9', 11 => 'VIP', 12 => '10', 13 => '11', 14 => '12'];
        foreach (Room::where('location_key', 'tamara-1')->get() as $room) {
            $numbers = $room->floor === 'Lantai 2' ? $floorTwoNumbers : $floorOneNumbers;
            $room->update(['code' => $numbers[$room->position] ?? $room->code]);
        }
        foreach (Room::where('location_key', 'tamara-2')->get() as $room) {
            $room->update(['code' => (string) $room->position]);
        }
    }
}
