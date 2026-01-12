<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mobils = [
            [
                'nama_mobil' => 'BYD Seal',
                'tipe' => 'Sedan',
                'tahun_produksi' => 2024,
                'harga' => 689000000,
                'warna' => 'Aurora White',
                'kapasitas_baterai' => '82.5 kWh',
                'jarak_tempuh' => '650 km',
                'waktu_charging' => '30 menit (DC fast)',
                'transmisi' => 'Automatic',
                'stok' => 5,
                'deskripsi' => 'BYD Seal adalah sedan listrik premium dengan teknologi Blade Battery yang revolusioner. Dengan desain aerodinamis dan performa luar biasa, Seal menawarkan pengalaman berkendara yang mewah dan ramah lingkungan.',
            ],
            [
                'nama_mobil' => 'BYD Atto 3',
                'tipe' => 'SUV',
                'tahun_produksi' => 2024,
                'harga' => 519000000,
                'warna' => 'Surf Blue',
                'kapasitas_baterai' => '60.48 kWh',
                'jarak_tempuh' => '480 km',
                'waktu_charging' => '35 menit (DC fast)',
                'transmisi' => 'Automatic',
                'stok' => 8,
                'deskripsi' => 'BYD Atto 3 adalah SUV compact listrik yang stylish dengan interior futuristik. Dilengkapi dengan fitur keselamatan canggih dan sistem infotainment terdepan.',
            ],
            [
                'nama_mobil' => 'BYD Dolphin',
                'tipe' => 'Hatchback',
                'tahun_produksi' => 2024,
                'harga' => 379000000,
                'warna' => 'Coral Pink',
                'kapasitas_baterai' => '44.9 kWh',
                'jarak_tempuh' => '410 km',
                'waktu_charging' => '40 menit (DC fast)',
                'transmisi' => 'Automatic',
                'stok' => 12,
                'deskripsi' => 'BYD Dolphin adalah hatchback listrik yang fun dan praktis untuk kehidupan urban. Compact namun luas, dengan harga terjangkau tanpa mengorbankan kualitas.',
            ],
            [
                'nama_mobil' => 'BYD M6',
                'tipe' => 'MPV',
                'tahun_produksi' => 2024,
                'harga' => 459000000,
                'warna' => 'Crystal Black',
                'kapasitas_baterai' => '71.8 kWh',
                'jarak_tempuh' => '530 km',
                'waktu_charging' => '35 menit (DC fast)',
                'transmisi' => 'Automatic',
                'stok' => 6,
                'deskripsi' => 'BYD M6 adalah MPV listrik yang cocok untuk keluarga Indonesia. Dengan kapasitas 7 penumpang dan ruang bagasi luas, M6 menawarkan kenyamanan maksimal untuk perjalanan jauh.',
            ],
            [
                'nama_mobil' => 'BYD Han',
                'tipe' => 'Sedan',
                'tahun_produksi' => 2024,
                'harga' => 899000000,
                'warna' => 'Titanium Grey',
                'kapasitas_baterai' => '85.4 kWh',
                'jarak_tempuh' => '700 km',
                'waktu_charging' => '25 menit (DC fast)',
                'transmisi' => 'Automatic',
                'stok' => 3,
                'deskripsi' => 'BYD Han adalah flagship sedan listrik BYD dengan performa supercar. Akselerasi 0-100 km/h hanya dalam 3.9 detik dengan teknologi terdepan dan kemewahan kelas atas.',
            ],
            [
                'nama_mobil' => 'BYD Tang',
                'tipe' => 'SUV',
                'tahun_produksi' => 2023,
                'harga' => 1150000000,
                'warna' => 'Midnight Blue',
                'kapasitas_baterai' => '108.8 kWh',
                'jarak_tempuh' => '600 km',
                'waktu_charging' => '30 menit (DC fast)',
                'transmisi' => 'Automatic',
                'stok' => 2,
                'deskripsi' => 'BYD Tang adalah SUV listrik 7-seater premium dengan all-wheel drive. Kombinasi sempurna antara kemewahan, performa, dan kepraktisan untuk keluarga modern.',
            ],
            [
                'nama_mobil' => 'BYD Seagull',
                'tipe' => 'Hatchback',
                'tahun_produksi' => 2024,
                'harga' => 289000000,
                'warna' => 'Sky Blue',
                'kapasitas_baterai' => '38.88 kWh',
                'jarak_tempuh' => '405 km',
                'waktu_charging' => '45 menit (DC fast)',
                'transmisi' => 'Automatic',
                'stok' => 15,
                'deskripsi' => 'BYD Seagull adalah city car listrik yang super affordable. Ideal untuk mobilitas harian di perkotaan dengan biaya operasional sangat rendah.',
            ],
            [
                'nama_mobil' => 'BYD Song Plus',
                'tipe' => 'SUV',
                'tahun_produksi' => 2024,
                'harga' => 599000000,
                'warna' => 'Forest Green',
                'kapasitas_baterai' => '71.7 kWh',
                'jarak_tempuh' => '505 km',
                'waktu_charging' => '35 menit (DC fast)',
                'transmisi' => 'Automatic',
                'stok' => 0,
                'deskripsi' => 'BYD Song Plus adalah mid-size SUV listrik dengan desain elegan dan teknologi canggih. Perpaduan sempurna antara gaya dan fungsionalitas.',
            ],
        ];

        foreach ($mobils as $mobil) {
            Mobil::firstOrCreate(
                ['nama_mobil' => $mobil['nama_mobil']],
                $mobil
            );
        }
    }
}
