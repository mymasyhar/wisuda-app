<?php

namespace Database\Seeders;

use App\Models\Pelaksanaan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PelaksnaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelaksanaan::create([
            'periode_id' => 1,
            'start_pendaftaran' => Carbon::parse('2021-04-01'),
            'end_pendaftaran' => Carbon::parse('2021-04-20'),
            'start_verifikasi' => Carbon::parse('2021-04-21'),
            'end_verifikasi' => Carbon::parse('2021-04-30'),
            'start_pengambilan' => Carbon::parse('2021-05-01'),
            'end_pengambilan' => Carbon::parse('2021-05-10'),
            'wisuda' => Carbon::parse('2021-05-20'),
            'start_pengembalian' => Carbon::parse('2021-05-21'),
            'end_pengembalian' => Carbon::parse('2021-05-30')
        ]);
    }
}
