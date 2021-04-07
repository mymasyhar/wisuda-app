<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use App\Models\Mahasiswa;
use App\Models\Pelaksanaan;
use App\Models\Pengambilan;
use App\Models\Pengembalian;
use App\Models\Periode;
use App\Models\TahunAjaran;
use App\Models\Wisuda;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WisudaController extends Controller
{
    //
    public function index()
    {
        # code...

        $data = Mahasiswa::has('wisuda.berkas')->with('user', 'wisuda.berkas', 'prodi.fakultas')->get();
        // dd($data);
        return view('admin.verification', compact('data'));
    }

    public function detail($nim)
    {
        $t_a = TahunAjaran::where('start_TA', '<=', now())->where('end_TA', '>=', now())->value('id');
        $periode = Periode::whereTahunAjaranId($t_a)->where('start', '<=', now())->where('end', '>=', now())->value('id');
        $pelaksanaan = Pelaksanaan::wherePeriodeId($periode)->first();

        $data = Mahasiswa::where('nim', $nim)->has('wisuda.berkas')->with('wisuda.berkas')->first();

        return view('admin.detail', compact('data', 'pelaksanaan'));
    }

    public function verifikasidokumen(Request $request, Berkas $berkas)
    {
        // dd($berkas);

        $berkas->update($request->except('wisuda_id', 'tgl_ambil'));
        if (
            $request->status_pasfoto == 'acc' &&
            $request->status_scanktp == 'acc' &&
            $request->status_bebasperpustakaan == 'acc' &&
            $request->status_toeflcept == 'acc' &&
            $request->status_buktiskripsi == 'acc' &&
            $request->status_pengesahanskripsi == 'acc' && $request->status_pembayaranpendaftaran == 'acc'
        ) {
            $validator = Validator::make($request->all(), [
                'tgl_ambil' => 'required|date'
            ], [
                'required' => 'Form :attribute harus diisi'
            ], [
                'tgl_ambil' => 'Tanggal Pengambilan'
            ]);

            if ($validator->fails()) {
                alert()->error('Gagal', $validator->getMessageBag()->first());
                return back();
            }

            Pengambilan::create([
                'wisuda_id' => $request->wisuda_id,
                'tgl_ambil' => $request->tgl_ambil
            ]);
        }
        return back();
    }

    public function dokumenverified()
    {
        $mahasiswa = Mahasiswa::has('wisuda.berkas')->with('user', 'prodi.fakultas', 'wisuda.berkas')->get();

        return view('admin.verified', compact('mahasiswa'));
    }

    public function kelengkapan()
    {
        $mahasiswa = Mahasiswa::has('wisuda.pengambilan')->doesntHave('wisuda.pengembalian')->with('user', 'prodi.fakultas', 'wisuda.pengambilan')->get();

        return view('admin.kelengkapan', compact('mahasiswa'));
    }

    public function pengambilan(Request $request, $wisuda_id)
    {
        // dd($request);
        Pengembalian::create([
            'wisuda_id' => $wisuda_id,
            'tgl_pengembalian' => now(),
            'status' => $request->status
        ]);

        alert()->success('Berhasil', 'Berhasil Acc Pengambilan');
        return back();
    }

    public function pengembalian()
    {
        $mahasiswa = Mahasiswa::has('wisuda.pengembalian')->with('user', 'prodi.fakultas', 'wisuda.periode.pelaksanaan', 'wisuda.pengembalian')->get();
        return view('admin.return', compact('mahasiswa'));
    }

    public function accpengembalian(Pengembalian $pengembalian)
    {
        $pengembalian->update([
            'status' => 'selesai'
        ]);
        alert()->success('Berhasil', 'Pengembalian berhasil dilakukan');
        return back();
    }
}
