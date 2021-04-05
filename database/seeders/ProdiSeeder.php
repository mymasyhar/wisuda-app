<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data_FE =
            [
                '(D3) Akuntansi',
                '(D3) Manajemen',
                '(D3) Perbankan dan Keuangan ',
                '(S1) Akuntansi',
                '(S1) Manajemen',
                '(S1) Ekonomi Pembangunan',
                '(S2) Manajemen',
                '(S2) Akuntansi',
                '(S2) Ilmu Ekonomi',
                '(S3) Ilmu Ekonomi'
            ];

        $data_FH =
            [
                '(S1) Hukum',
                '(S2) Hukum',
                '(S2) Kenotariatan',
                '(S3) Hukum'
            ];

        $data_FPSB =
            [
                '(S1) Psikologi',
                '(S1) Ilmu Komunikasi',
                '(S1) Hubungan Internasional',
                '(S1) Pendidikan Bahasa Inggris',
                '(S2) Profesi Psikologi',
            ];

        $data_FTI =
            [
                '(S1) Teknik Kimia',
                '(S1) Teknik Industri',
                '(S1) Informatika',
                '(S1) Teknik Elektro',
                '(S1) Teknik Mesin',
                '(S1) Rekayasa Tekstil',
                '(S2) Teknik Industri',
                '(S2) Informatika',
            ];

        $data_FTSP =
            [
                '(S1) Teknik Sipil',
                '(S1) Arsitektur',
                '(S1) Teknik Lingkungan',
                '(S2) Arsitektur',
                '(S2) Teknik Sipil',
                '(S3) Teknik Sipil',
                '(Prof) Profesi Arsitektur'
            ];

        $data_FMIPA =
            [
                '(D3) Analisis Kimia',
                '(S1) Kimia',
                '(S1) Farmasi',
                '(S1) Statistika',
                '(S2) Pendidikan Kimia',
                '(S2) Kimia'
            ];

        $data_FK =
            [
                '(S1) Kedokteran',
                '(Prof) Profesi Dokter',
            ];

        $data_FIAI =
            [
                '(S1) Ahwal Al Syakhshiyah',
                '(S1) Ekonomi Islam',
                '(S1) Pendidikan Agama Islam',
                '(S2) Ilmu Agama Islam',
                '(S3) Hukum Islam'
            ];

        $fakultas = Fakultas::all();
        foreach ($fakultas as $ft) {
            if ($ft->nama == 'FE') {
                foreach ($data_FE as $FE) {
                    Prodi::create([
                        'nama' => $FE,
                        'fakultas_id' => $ft->id
                    ]);
                }
            } else if ($ft->nama == 'FH') {
                foreach ($data_FH as $FH) {
                    Prodi::create([
                        'nama' => $FH,
                        'fakultas_id' => $ft->id
                    ]);
                }
            } else if ($ft->nama == 'FPSB') {
                foreach ($data_FPSB as $FPSB) {
                    Prodi::create([
                        'nama' => $FPSB,
                        'fakultas_id' => $ft->id
                    ]);
                }
            } else if ($ft->nama == 'FTI') {
                foreach ($data_FTI as $FTI) {
                    Prodi::create([
                        'nama' => $FTI,
                        'fakultas_id' => $ft->id
                    ]);
                }
            } else if ($ft->nama == 'FTSP') {
                foreach ($data_FTSP as $FTSP) {
                    Prodi::create([
                        'nama' => $FTSP,
                        'fakultas_id' => $ft->id
                    ]);
                }
            } else if ($ft->nama == 'FMIPA') {
                foreach ($data_FMIPA as $FMIPA) {
                    Prodi::create([
                        'nama' => $FMIPA,
                        'fakultas_id' => $ft->id
                    ]);
                }
            } else if ($ft->nama == 'FK') {
                foreach ($data_FK as $FK) {
                    Prodi::create([
                        'nama' => $FK,
                        'fakultas_id' => $ft->id
                    ]);
                }
            } else if ($ft->nama == 'FIAI') {
                foreach ($data_FIAI as $FIAI) {
                    Prodi::create([
                        'nama' => $FIAI,
                        'fakultas_id' => $ft->id
                    ]);
                }
            }
        }
    }
}
