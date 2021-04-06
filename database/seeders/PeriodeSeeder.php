<?php

namespace Database\Seeders;

use App\Models\Periode;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periode::create([
            'tahun_ajaran_id' => 1,
            'nama' => 1,
            'start' => Carbon::parse('2021-04-1'),
            'end' => Carbon::parse('2021-05-30'),
        ]);
    }
}
