<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FakultasSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(TahunAjaranSeeder::class);
        $this->call(PeriodeSeeder::class);
        $this->call(PelaksnaanSeeder::class);
    }
}
