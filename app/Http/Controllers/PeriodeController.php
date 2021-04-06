<?php

namespace App\Http\Controllers;

use App\Models\Pelaksanaan;
use App\Models\Periode;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    //
    public function index()
    {
        $tahunajaran = TahunAjaran::with('periode.pelaksanaan')->get();
        return view('superadmin.periodic', compact('tahunajaran'));
    }

    public function addperiodic()
    {
        $tahunajaran = TahunAjaran::all();
        $periode = Periode::all();
        return view('superadmin.add-periodic', compact('tahunajaran', 'periode'));
    }

    public function addperiodicpost(Request $request)
    {
        $tahunajaran = TahunAjaran::create([
            'start_TA' => $request->start_TA,
            'end_TA' => $request->end_TA,
        ]);

        $periode = Periode::create([
            'tahun_ajaran_id' => $tahunajaran->id,
            'nama' => $request->periode,
            'start' => $request->start,
            'end' => $request->end
        ]);

        $pelaksanaan = Pelaksanaan::create([
            'periode_id' => $periode->id,
            'start_pendaftaran' => $request->start_pendaftaran,
            'end_pendaftaran' => $request->end_pendaftaran,
            'start_verifikasi' => $request->start_verifikasi,
            'end_verifikasi' => $request->end_verifikasi,
            'start_pengambilan' => $request->start_pengambilan,
            'end_pengambilan' => $request->end_pengambilan,
            'wisuda' => $request->tglpelaksanaan,
            'start_pengembalian' => $request->start_pengembalian,
            'end_pengembalian' => $request->end_pengembalian
        ]);

        alert()->success('Berhasil', 'Periode Berhasil ditambahkan');
        return redirect('/superadmin/periodic');
    }
}
