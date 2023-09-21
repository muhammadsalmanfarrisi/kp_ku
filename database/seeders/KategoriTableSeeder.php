<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        for($i = 1 ; $i <= 20 ; $i++){
            Kategori::insert([
                'keputusan' => 'PERSETUJUAN',
        'instansi' => 'BRI',
        'program' => 'KUR',
        'nomor_surat' => $faker->numberBetween($min=1000, $max=9000),
        'cabang' => $faker->city . ' Branch',
        'unit' => $faker->city,
        'bulan' => $faker->monthName,
        'tahun' => $faker->year,
            ]);
        }
    }
}
