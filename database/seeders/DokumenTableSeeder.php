<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DokumenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1 ; $i <= 10 ; $i++){
            Dokumen::insert([
                'nik' => $faker->numerify('################'),
        'nama' => $faker->name,
        'alamat' => $faker->numerify('################'),
        'nomor_nasabah' => $faker->numberBetween($min = 1000, $max = 9000) . '/KD/SFT/VI/2023',
        'dokumen' => 'KLAIM' . date('Ymdhis'),
        'kategori_id' => '23',
            ]);
        }
    }
}
