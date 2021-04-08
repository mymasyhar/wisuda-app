<?php

namespace App\Http\Controllers;

use App\Models\Pelaksanaan;
use App\Models\Periode;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeriodeController extends Controller
{
    //
    public function index()
    {
        $periode = Periode::has('pelaksanaan')->with('pelaksanaan', 'tahunajaran')->get();
        return view('superadmin.periodic', compact('periode'));
    }

    public function tahunajaran()
    {
        $tahunajaran = TahunAjaran::all();
        $end = TahunAjaran::latest()->value('end_TA');
        if (is_null($end)) {
            $end = '';
        }
        return view('superadmin.tahun-ajaran', compact('end', 'tahunajaran'));
    }

    public function tahunajaranpost(Request $request)
    {
        TahunAjaran::create([
            'start_TA' => $request->start_TA,
            'end_TA' => $request->end_TA
        ]);
        alert()->success('Berhasil', 'Berhasil menambahkan Tahun Ajaran');
        return back();
    }

    public function periode()
    {
        $periode = Periode::with('tahunajaran')->get();
        $tahunajaran = TahunAjaran::with('periode')->get();
        return view('superadmin.periode', compact('periode', 'tahunajaran'));
    }

    public function periodepost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mulai_periode' => 'required|date',
            'selesai_periode' => 'required|date|after:mulai_periode'
        ], [
            'required' => 'Form :attribute harus diisi',
            'after' => ' :attribute tidak boleh sebelum :date.',
            'date' => ' :attribute tidak valid.'
        ], [
            'mulai_periode' => 'Tanggal Mulai Periode',
            'selesai_periode' => 'Tanggal Selesai Periode'
        ]);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->getMessageBag()->first());
            return back();
        }

        Periode::create([
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'nama' => $request->periode,
            'start' => $request->mulai_periode,
            'end' => $request->selesai_periode
        ]);


        alert()->success('Berhasil', 'Berhasil menambahkan periode');
        return back();
    }

    public function addperiodic()
    {
        $tahunajaran = TahunAjaran::all();
        $periode = Periode::all();
        return view('superadmin.add-periodic', compact('tahunajaran', 'periode'));
    }

    public function addperiodicpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tglpelaksanaan' => 'required|date|after:end_pengambilan',
            'start_pendaftaran' => 'required|date',
            'end_pendaftaran' => 'required|date|after:start_pendaftaran',
            'start_verifikasi' => 'required|date|after:end_pendaftaran',
            'end_verifikasi' => 'required|date|after:start_verifikasi',
            'start_pengambilan' => 'required|date|after:end_verifikasi',
            'end_pengambilan' => 'required|date|after:start_pengambilan',
            'start_pengembalian' => 'required|date|after:tglpelaksanaan',
            'end_pengembalian' => 'required|date|after:start_pengembalian'
        ], [
            'required' => 'Form :attribute harus diisi',
            'after' => ' :attribute tidak boleh sebelum :date.',
            'date' => ' :attribute tidak valid.'
        ], [
            'tglpelaksanaan' => 'Tanggal Pelaksanaan Wisuda',
            'start_pendaftaran' => 'Tanggal Mulai Pendaftaran Wisuda',
            'end_pendaftaran' => 'Tanggal Selesai Pendaftaran Wisuda',
            'start_verifikasi' => 'Tanggal Mulai Verifikasi Berkas',
            'end_verifikasi' => 'Tanggal Selesai Verifikasi Berkas',
            'start_pengambilan' => 'Tanggal Mulai Pengambilan Kelengkapan',
            'end_pengambilan' => 'Tanggal Selesai Pengambilan Kelengkapan',
            'start_pengembalian' => 'Tanggal Mulai Pengembalian Kelengkapan',
            'end_pengembalian' => 'Tanggal Selesai Pengembalian Kelengkapan',
        ]);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->getMessageBag()->first());
            return back();
        }


        $periode = Periode::where('tahun_ajaran_id', $request->tahun_ajaran_id)->where('nama', $request->periode_id)->value('id');

        Pelaksanaan::create([
            'periode_id' => $periode,
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
