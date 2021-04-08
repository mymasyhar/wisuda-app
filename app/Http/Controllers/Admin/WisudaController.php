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
use Illuminate\Database\Eloquent\Builder;
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

    public function pengembalianAttr()
    {
        $mahasiswa = Mahasiswa::whereUserId(auth()->user()->id)->has('wisuda.pengambilan')->with('wisuda.pengembalian', 'wisuda.periode.pelaksanaan', 'wisuda.pengambilan')->first();

        return view('students.pengembalian', compact('mahasiswa'));
    }

    public function archive(Request $request)
    {
        // dd($request);
        $ta_id = $request->tahun_ajaran_id ?? 0;
        $periode = $request->periode_id ?? 0;
        $wisuda = $this->getDataArchive($ta_id, $periode);
        $tahunajaran = TahunAjaran::all();

        return view('admin.archive', compact('tahunajaran', 'wisuda'));
    }

    private function getDataArchive($ta_id, $periode_nama)
    {
        if ($ta_id == 0) {
            $sekarang = now()->format('Y-m-d');
            $tahunajaran = TahunAjaran::where('start_ta', '<=', $sekarang)->where('end_TA', '>=', $sekarang)->value('id');
            $periode = Periode::whereTahunAjaranId($tahunajaran)->where('start', '<=', $sekarang)->where('end', '>=', $sekarang)->value('id');
        } else {
            $tahunajaran = TahunAjaran::whereId($ta_id)->value('id');
            $periode = Periode::whereTahunAjaranId($tahunajaran)->whereNama($periode_nama)->value('id');
        }

        $wisuda = Wisuda::wherePeriodeId($periode)->has('pengembalian')->with('mahasiswa.user', 'mahasiswa.prodi.fakultas')->get();

        return $wisuda;
    }
}
