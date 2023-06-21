<?php

namespace Database\Seeders;

use App\Models\Skor_pertandingan;
use Illuminate\Database\Seeder;

class SkorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'id_klub1' => '1',
                'id_klub2' => '2',
                'skor_1' => '3',
                'skor_2' => '1'
            ]
        ])->each(function($skor) {
            Skor_pertandingan::create($skor);
        });
    }
}
