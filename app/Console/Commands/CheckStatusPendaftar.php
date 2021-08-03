<?php

namespace App\Console\Commands;

use App\Models\Periode;
use App\Models\Wisuda;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckStatusPendaftar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wisuda:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check dan update status pendaftar';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "\nPengecekan peserta wisuda\n";
        $sekarang = now();

        $periode = Periode::where('start', '<=', $sekarang)->where('end', '>=', $sekarang)->with('pelaksanaan')->first();
        $wisuda = Wisuda::with('berkas', 'pengambilan', 'pengembalian')->get();

        $end_pendaftaran = Carbon::parse($periode->pelaksanaan->end_pendaftaran)->endOfDay();

        $end_verifikasi = Carbon::parse($periode->pelaksanaan->end_verifikasi)->endOfDay();

        $end_pengambilan = Carbon::parse($periode->pelaksanaan->end_pengambilan)->endOfDay();

        $end_pengembalian = Carbon::parse($periode->pelaksanaan->end_pengembalian)->endOfDay();

        $result = false;

        echo "\nProses....\n";
        foreach ($wisuda as $w) {
            echo $w->mahasiswa->nim;
            if (is_null($w->berkas) && $sekarang > $end_verifikasi) { //belum upload, lewat
                $w->delete();
                $nim = $w->mahasiswa->nim;
                $status = "Lewat verifikasi";
                $result = true;
            } elseif ($w->berkas->status() != 'acc' && $sekarang > $end_verifikasi) { //belum lolos verif, lewat
                $w->delete();
                $w->berkas->delete();
                $nim = $w->mahasiswa->nim;
                $status = "Tidak Lolos verifikasi";
                $result = true;
            } elseif ((!is_null($w->pengambilan) && is_null($w->pengembalian)) && $sekarang > $end_pengambilan) { //ngga ngambil, lewat
                $w->pengembalian->save();
                $w->pengembalian->status = 'beli';
                $nim = $w->mahasiswa->nim;
                $status = "Tidak Mengambil Atribut";
                $result = true;
            } elseif ((is_null($w->pengembalian->tgl_pengembalian) || $w->pengembalian->status == 'pinjam') && $sekarang > $end_pengembalian) { //udah minjem, tapi kabur, lewat
                $w->pengembalian->save();
                $w->pengembalian->status = 'beli';
                $status = "Tidak Mengembalikan Atribut";
                $nim = $w->mahasiswa->nim;
                $result = true;
            }

            if ($result) {
                echo "\n" . $nim . " - " . $status . "\n";
            }
        }
        echo "\nSelesai\n";
        return 1;
    }
}
