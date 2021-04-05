<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = ['FE', 'FH', 'FPSB', 'FTI', 'FTSP', 'FMIPA', 'FK', 'FIAI'];
        foreach ($data as $dt) {
            Fakultas::create(['nama' => $dt]);
        }
    }
}
