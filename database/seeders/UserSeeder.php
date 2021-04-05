<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $user = User::create([
            'kode' => '16523171',
            'name' => 'Masyhar Muharam',
            'email' => '16523171@uii.ac.id',
            'role' => 'mahasiswa',
            'password' => Hash::make('12345678')
        ])
            ->assignRole('mahasiswa');

        Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => '16523171',
            'tempatlahir' => 'Kendari',
            'tgllahir' => '1998-05-03',
            'prodi_id' => 22,
            'alamatasal' => 'Kendari'
        ]);

        User::create([
            'kode' => '12345678',
            'name' => 'Admin A',
            'email' => 'admin@uii.ac.id',
            'role' => 'admin',
            'password' => Hash::make('12345678')
        ])
            ->assignRole('admin');

        User::create([
            'kode' => '87654321',
            'name' => 'SuperAdmin A',
            'email' => 'superadmin@uii.ac.id',
            'role' => 'superadmin',
            'password' => Hash::make('12345678')
        ])
            ->assignRole('superadmin');
    }
}
