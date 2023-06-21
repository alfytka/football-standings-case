<?php

namespace Database\Seeders;

use App\Models\Klub;
use Illuminate\Database\Seeder;

class KlubSeeder extends Seeder
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
                'nama_klub' => 'Persib',
                'kota' => 'Bandung'
            ],
            [
                'nama_klub' => 'Persija',
                'kota' => 'Jakarta'
            ],
            [
                'nama_klub' => 'Arema FC',
                'kota' => 'Malang'
            ],
            [
                'nama_klub' => 'Persebaya',
                'kota' => 'Surabaya'
            ],
        ])->each(function($klub) {
            Klub::create($klub);
        });
    }
}
