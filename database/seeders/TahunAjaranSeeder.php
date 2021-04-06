<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TahunAjaran::create([
            'start_TA' => Carbon::parse('2020-07-01'),
            'end_TA' => Carbon::parse('2021-06-30'),
        ]);
    }
}
