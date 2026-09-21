<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $locations = [
            'tamara-1' => ['name' => 'Pondokan Tamara I', 'shortName' => 'Tamara I', 'mapUrl' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86', 'address' => "Jl. Tarutung Soposurung No., Sangkar Nihuta\nKec. Balige, Kabupaten Toba\nSumatera Utara 22312", 'mapCode' => '83H3+F9, Balige', 'rating' => '4,8'],
            'tamara-2' => ['name' => 'Pondokan Tamara II', 'shortName' => 'Tamara II', 'mapUrl' => 'https://maps.app.goo.gl/dMjYLE5TfyiTwC1TA', 'address' => "83M9+78M, Balige II\nKec. Balige, Kabupaten Toba\nSumatera Utara", 'mapCode' => '83M9+78M, Balige II', 'rating' => '4,0'],
        ];

        $fallbackRooms = collect([
            ['location_key' => 'tamara-1', 'code' => 'A-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 3],
            ['location_key' => 'tamara-1', 'code' => 'A-02', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 7],
            ['location_key' => 'tamara-1', 'code' => 'A-03', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1200000, 'status' => 'reserved', 'size' => '4 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 9],
            ['location_key' => 'tamara-1', 'code' => 'A-04', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1200000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 4],
            ['location_key' => 'tamara-1', 'code' => 'B-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '3 x 3 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 8],
            ['location_key' => 'tamara-1', 'code' => 'B-02', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1200000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 10],
            ['location_key' => 'tamara-1', 'code' => 'B-03', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'reserved', 'size' => '3 x 3 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 12],
            ['location_key' => 'tamara-1', 'code' => 'B-04', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1200000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 13],
            ['location_key' => 'tamara-1', 'code' => 'L-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 1],
            ['location_key' => 'tamara-1', 'code' => 'L-02', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 2],
            ['location_key' => 'tamara-1', 'code' => 'L-03', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 5],
            ['location_key' => 'tamara-1', 'code' => 'L-04', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 950000, 'status' => 'reserved', 'size' => '4 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 6],
            ['location_key' => 'tamara-1', 'code' => 'VIP-01', 'floor' => 'Lantai 1', 'type' => 'VIP', 'price' => 1500000, 'status' => 'available', 'size' => '4 x 6 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 11],
            ['location_key' => 'tamara-1', 'code' => 'D-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 14],
            ['location_key' => 'tamara-1', 'code' => 'E-01', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 1],
            ['location_key' => 'tamara-1', 'code' => 'E-02', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 2],
            ['location_key' => 'tamara-1', 'code' => 'E-03', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 5],
            ['location_key' => 'tamara-1', 'code' => 'E-04', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'reserved', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 6],
            ['location_key' => 'tamara-1', 'code' => 'F-01', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 3],
            ['location_key' => 'tamara-1', 'code' => 'F-02', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'available', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 7],
            ['location_key' => 'tamara-1', 'code' => 'F-03', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 950000, 'status' => 'occupied', 'size' => '4 x 4 m', 'features' => ['Wi-Fi'], 'position' => 9],
            ['location_key' => 'tamara-1', 'code' => 'VIP-02', 'floor' => 'Lantai 2', 'type' => 'VIP', 'price' => 1500000, 'status' => 'available', 'size' => '4 x 6 m', 'features' => ['Wi-Fi'], 'position' => 11],
            ['location_key' => 'tamara-1', 'code' => 'G-01', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 4],
            ['location_key' => 'tamara-1', 'code' => 'G-02', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'reserved', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 8],
            ['location_key' => 'tamara-1', 'code' => 'G-03', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 10],
            ['location_key' => 'tamara-1', 'code' => 'G-04', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 12],
            ['location_key' => 'tamara-1', 'code' => 'G-05', 'floor' => 'Lantai 2', 'type' => 'Standard', 'price' => 1050000, 'status' => 'occupied', 'size' => '3 x 4 m', 'features' => ['Wi-Fi'], 'position' => 13],
            ['location_key' => 'tamara-2', 'code' => 'C-01', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 900000, 'status' => 'available', 'size' => '3 x 3 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 1],
            ['location_key' => 'tamara-2', 'code' => 'C-02', 'floor' => 'Lantai 1', 'type' => 'Standard', 'price' => 900000, 'status' => 'occupied', 'size' => '3 x 3 m', 'features' => ['Kamar mandi dalam', 'Wi-Fi'], 'position' => 2],
            ['location_key' => 'tamara-2', 'code' => 'C-03', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1150000, 'status' => 'available', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 3],
            ['location_key' => 'tamara-2', 'code' => 'C-04', 'floor' => 'Lantai 1', 'type' => 'Comfort', 'price' => 1150000, 'status' => 'reserved', 'size' => '3 x 4 m', 'features' => ['Jendela besar', 'Wi-Fi'], 'position' => 4],
        ]);

        try { $storedRooms = Room::orderBy('position')->get(); } catch (\Throwable) { $storedRooms = collect(); }

        $rooms = collect();
        foreach (array_keys($locations) as $locationKey) {
            foreach ($fallbackRooms->where('location_key', $locationKey)->groupBy('floor') as $floor => $fallbackForFloor) {
                $storedForFloor = $storedRooms->where('location_key', $locationKey)->where('floor', $floor)->values();
                $rooms = $rooms->concat($storedForFloor->count() >= $fallbackForFloor->count() ? $storedForFloor : $fallbackForFloor->values());
            }
        }

        $rooms = $rooms->values();

        $reviews = collect([
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Theresia Sitorus', 'meta' => '3 tahun lalu · 3 ulasan · 9 foto', 'avatar' => 'TS', 'title' => 'Bersih, nyaman dan sejukkk..', 'text' => 'Parkirannya juga luas dan pemiliknya ramah 🥰<br>Dan ternyata pondokan ini bisa sewa harian, mingguan bahkan bulanan.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Par BALIGE', 'meta' => '2 tahun lalu · 1 ulasan', 'avatar' => 'PB', 'title' => 'Tempat nyaman dan terjangkau.', 'text' => 'Tempat nyaman, bersih, harga terjangkau, cocok untuk kost anak sekolahan di Soposurung..', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Harrys Simanungkalit', 'meta' => '2 tahun lalu · Local Guide · 10 ulasan · 21 foto', 'avatar' => 'HS', 'title' => 'Pengalaman menginap yang baik.', 'text' => 'It\'s been 6 years I\'m staying here. It\'s not perfect but it\'s nice.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'bulan siahaan', 'meta' => 'Diedit setahun lalu · 3 ulasan · 5 foto', 'avatar' => 'BS', 'title' => 'Nyaman, sejuk, tenang.', 'text' => 'Nyaman.sejuk.tenang.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Reza Al-fatih', 'meta' => 'Diedit 4 tahun lalu · Local Guide · 1 ulasan', 'avatar' => 'RA', 'title' => 'Suka sekali.', 'text' => 'Suka sekali.<br><br><strong>Kamar: 5</strong><br><br><strong>Layanan: 5</strong><br><br><strong>Lokasi: 5</strong>', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★☆', 'author' => 'Ammar Nst', 'meta' => '3 tahun lalu · Local Guide · 21 ulasan · 5 foto', 'avatar' => 'AN', 'title' => 'Mantaps.', 'text' => 'Mantaps', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Damai Arta', 'meta' => '3 tahun lalu · Local Guide · 25 ulasan · 3 foto', 'avatar' => 'DA', 'title' => 'Nyaman.', 'text' => 'Nyaman', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'edward sitorus', 'meta' => '4 tahun lalu · Local Guide · 4 ulasan · 27 foto', 'avatar' => 'ES', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★☆', 'author' => 'Kevin T M T', 'meta' => '6 tahun lalu · Local Guide · 147 ulasan · 499 foto', 'avatar' => 'KT', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'DAVID MULIA PARULIAN', 'meta' => '7 tahun lalu · Local Guide · 24 ulasan · 16 foto', 'avatar' => 'DP', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Elfrida Pangaribuan', 'meta' => '7 tahun lalu · 1 ulasan', 'avatar' => 'EP', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Nita Siahaan', 'meta' => '7 tahun lalu', 'avatar' => 'NS', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★☆☆', 'author' => 'Arbie Samudra', 'meta' => 'Diedit 5 tahun lalu · Local Guide · 864 ulasan · 4.453 foto', 'avatar' => 'AS', 'title' => 'Kamar banyak dan sering penuh.', 'text' => 'Kamarnya banyak, namun selalu full booked. Tarif kamar Rp. 700K/bulan.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'bulan siahaan', 'meta' => '2 tahun lalu · 3 ulasan · 5 foto', 'avatar' => 'BS', 'title' => 'Nyaman dan terjangkau.', 'text' => 'Nyaman.<br>Tidak menguras kantong', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Yanti Manurung', 'meta' => '4 tahun lalu · 2 ulasan · 2 foto', 'avatar' => 'YM', 'title' => 'Enak yang ngurus.', 'text' => 'Enak yang ngurus kak cay 😁 ...', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Jackson Mora', 'meta' => '3 tahun lalu · Local Guide · 10 ulasan', 'avatar' => 'JM', 'title' => 'Bagus.', 'text' => 'Bagus', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'rolista sihombing', 'meta' => 'Setahun lalu · Local Guide · 17 ulasan · 2 foto', 'avatar' => 'RS', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Anggoro Palgunadi', 'meta' => 'Setahun lalu · Local Guide · 42 ulasan · 62 foto', 'avatar' => 'AP', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★★★', 'author' => 'Widya Nursafitri', 'meta' => '2 tahun lalu · 2 ulasan', 'avatar' => 'WN', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
            ['source' => 'Google Maps · Pondokan Tamara', 'rating' => '★★★☆☆', 'author' => 'Ata Pardede', 'meta' => '3 tahun lalu · Local Guide · 7 foto', 'avatar' => 'AP', 'title' => 'Rating pengunjung.', 'text' => 'Tidak ada komentar tertulis pada sumber.', 'link' => 'https://maps.app.goo.gl/fYPNS2xivRLqCrL86'],
        ]);

        return view('home', compact('locations', 'rooms', 'reviews'));
    }
}