<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = ['mahasiswa', 'admin', 'superadmin'];
        foreach ($data as $dt ) {
            Role::create(['name' => $dt]);
        }
    }
}
