<?php

namespace App\Http\Controllers;

use App\Http\Requests\BerkasRequest;
use App\Models\Berkas;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Wisuda;
use App\Models\{TahunAjaran, Periode, Pelaksanaan};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function index()
    {
        # code...
        $pendaftaran_wisuda = false;


        $t_a = TahunAjaran::where('start_TA', '<=', now()->startOfDay())->where('end_TA', '>=', now()->endOfDay())->value('id');

        if (!is_null($t_a)) {
            $periode = Periode::whereTahunAjaranId($t_a)->where('start', '<=', now()->startOfDay())->where('end', '>=', now()->endOfDay())->value('id');
            if (!is_null($periode)) {
                $pelaksanaan = Pelaksanaan::wherePeriodeId($periode)->first();
                if (!is_null($pelaksanaan)) {
                    if ($pelaksanaan->start_pendaftaran <= now()->startOfDay() && $pelaksanaan->end_pendaftaran >= now()->endOfDay()) {
                        $pendaftaran_wisuda = true;
                    }
                }
            }
        }
        $fakultas = Fakultas::all();
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::whereUserId(auth()->user()->id)->with('prodi.fakultas', 'user', 'wisuda')->first();
        return view('students.register', compact(['mahasiswa', 'fakultas', 'prodi', 'pendaftaran_wisuda']));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ipk' => 'required|numeric|max:4',
            'judulskripsi' => 'required|string|min:10',
            'dosenpembimbing1' => 'required|string',
            'dosenpembimbing2' => 'nullable|string',
            'nohp' => 'required|numeric|digits_between:9,13',
            'pekerjaan' => 'nullable|string'
        ], [
            'ipk.max' => ':attribute Maksimal :max',
            'required' => 'Form :attribute harus diisi',
            'numeric' => ':attribute Harus berupa angka.',
            'string' => ':attribute Setidaknya Harus berisikan Karakter dan Angka.',
            'integer' => ':attribute Harus berupa angka.',
            'judulskripsi.min' => ':attribute Setidaknya berjumlah :min Karakter.',
            'nohp.digits_between' => ':attribute Setidaknya berjumlah :min sampai :max Digit.',
            // 'nohp.max' => ':attribute Maksimal berjumlah :max Angka.',
        ], [
            'ipk' => 'Indeks Prestasi Kumulatif (IPK)',
            'judulskripsi' => 'Judul Skripsi',
            'dosenpembimbing1' => 'Dosen Pembimbing 1',
            'dosenpembimbing2' => 'Dosen Pembimbing 2',
            'nohp' => 'Nomor HP/Telepon',
            'pekerjaan' => 'Pekerjaan saat ini',
        ]);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->getMessageBag()->first());
            return back();
        }

        $t_a = TahunAjaran::where('start_TA', '<=', now()->startOfDay())->where('end_TA', '>=', now()->endOfDay())->value('id');
        $periode = Periode::whereTahunAjaranId($t_a)->where('start', '<=', now()->startOfDay())->where('end', '>=', now()->endOfDay())->value('id');

        //tambah elemen dalam request
        $request['periode_id'] = $periode;
        $request['KW_toga'] = 1;
        $request['KW_samir'] = 1;
        $request['KW_bukualumni'] = $request->KW_bukualumni ? 1 : 0;

        Wisuda::create($request->all());

        alert()->success('Pendaftaran Berhasil', 'Silahkan Lakukan Pembayaran dan Unggah berkas anda');

        return back();
    }

    public function berkas()
    {
        $data_verifikasi = Pelaksanaan::all();
        $mahasiswa = Mahasiswa::whereUserId(auth()->user()->id)->has('wisuda')->with('wisuda.berkas')->first();
        $berkas = is_null($mahasiswa) ?? false;

        $verifikasi = false;

        $t_a = TahunAjaran::where('start_TA', '<=', now()->startOfDay())->where('end_TA', '>=', now()->endOfDay())->value('id');

        if (!is_null($t_a)) {
            $periode = Periode::whereTahunAjaranId($t_a)->where('start', '<=', now()->startOfDay())->where('end', '>=', now()->endOfDay())->value('id');
            if (!is_null($periode)) {
                $pelaksanaan = Pelaksanaan::wherePeriodeId($periode)->first();
                if (!is_null($pelaksanaan)) {
                    if ($pelaksanaan->start_verifikasi <= now()->startOfDay() && $pelaksanaan->end_verifikasi >= now()->endOfDay()) {
                        $verifikasi = true;
                    }
                }
            }
        }

        // dd(!$mahasiswa->wisuda->berkas);
        // dd($data_verifikasi);
        return view('students.file-upload', compact('verifikasi', 'berkas', 'mahasiswa', 'data_verifikasi'));
    }

    public function uploadberkas(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pasfoto' => 'required|file|mimes:jpg,png,jpeg',
            'scanktp' => 'required|file|mimes:pdf',
            'bebasperpustakaan' => 'required|file|mimes:pdf',
            'toeflcept' => 'required|file|mimes:pdf',
            'buktiskripsi' => 'required|file|mimes:pdf',
            'pengesahanskripsi' => 'required|file|mimes:pdf',
            'pembayaranpendaftaran' => 'required|file|mimes:pdf'
        ], [
            'required' => 'Form :attribute harus diisi',
            'mimes' => ' Form :attribute Harus Berformat :values.',
        ], [
            'pasfoto' => 'Pas Foto',
            'scanktp' => 'Scan KTP',
            'bebasperpustakaan' => 'Scan Surat Bebas Perpustakaan',
            'toeflcept' => 'Scan Sertifikat CEPT / TOEFL',
            'buktiskripsi' => 'Scan Bukti Penyerahan Skripsi',
            'pengesahanskripsi' => 'Scan Bukti Pengesahan Skripsi',
            'pembayaranpendaftaran' => 'Scan Bukti Pembayaran Pendaftaran',
        ]);

        if ($validator->fails()) {
            alert()->error('Gagal', $validator->getMessageBag()->first());
            return back();
        }

        $pasfoto = $request->file('pasfoto');
        $scanktp = $request->file('scanktp');
        $bebasperpustakaan = $request->file('bebasperpustakaan');
        $toeflcept = $request->file('toeflcept');
        $buktiskripsi = $request->file('buktiskripsi');
        $pengesahanskripsi = $request->file('pengesahanskripsi');
        $pembayaranpendaftaran = $request->file('pembayaranpendaftaran');

        $data['wisuda_id'] = $request->wisuda_id;
        $data['pasfoto'] = auth()->user()->kode . '_pasfoto.' . $pasfoto->getClientOriginalExtension();
        $data['scanktp'] = auth()->user()->kode . '_scanktp.' . $scanktp->getClientOriginalExtension();
        $data['bebasperpustakaan'] = auth()->user()->kode . '_bebasperpustakaan.' . $bebasperpustakaan->getClientOriginalExtension();
        $data['toeflcept'] = auth()->user()->kode . '_toeflcept.' . $toeflcept->getClientOriginalExtension();
        $data['buktiskripsi'] = auth()->user()->kode . '_buktiskripsi.' . $buktiskripsi->getClientOriginalExtension();
        $data['pengesahanskripsi'] = auth()->user()->kode . '_pengesahanskripsi.' . $pengesahanskripsi->getClientOriginalExtension();
        $data['pembayaranpendaftaran'] = auth()->user()->kode . '_pembayaranpendaftaran.' . $pembayaranpendaftaran->getClientOriginalExtension();

        $direktori = 'img/berkas/' . auth()->user()->kode;

        $pasfoto->move($direktori, $data['pasfoto']);
        $scanktp->move($direktori, $data['scanktp']);
        $bebasperpustakaan->move($direktori, $data['bebasperpustakaan']);
        $toeflcept->move($direktori, $data['toeflcept']);
        $buktiskripsi->move($direktori, $data['buktiskripsi']);
        $pengesahanskripsi->move($direktori, $data['pengesahanskripsi']);
        $pembayaranpendaftaran->move($direktori, $data['pembayaranpendaftaran']);

        Berkas::create($data);

        alert()->success('Berhasil', 'Unggah Berkas Selesai');
        return back();
    }

    public function revisiberkas(Request $request, Berkas $berkas)
    {
        foreach ($request->except('_token', '_method', 'wisuda_id') as $key => $value) {
            // validator
            $ext = 'pdf';
            if ($key == 'pasfoto') {
                $ext = 'jpg,png,jpeg';
            }
            $rule[$key] = 'required|file|mimes:' . $ext;
        }

        $validator = Validator::make($request->all(), $rule, [
            'required' => 'Form :attribute harus diisi',
            'mimes' => ' Form :attribute Harus Berformat :values.',
        ], [
            'pasfoto' => 'Pas Foto',
            'scanktp' => 'Scan KTP',
            'bebasperpustakaan' => 'Scan Surat Bebas Perpustakaan',
            'toeflcept' => 'Scan Sertifikat CEPT / TOEFL',
            'buktiskripsi' => 'Scan Bukti Penyerahan Skripsi',
            'pengesahanskripsi' => 'Scan Bukti Pengesahan Skripsi',
            'pembayaranpendaftaran' => 'Scan Bukti Pembayaran Pendaftaran',
        ]);

        if ($validator->fails()) {
            // dd('awd');
            alert()->error('Gagal', $validator->getMessageBag()->first());
            return back();
        }

        $data['wisuda_id'] = $request->wisuda_id;

        $direktori = 'img/berkas/' . auth()->user()->kode;

        foreach ($request->except('_token', '_method', 'wisuda_id') as $key => $value) {
            // file
            $file[$key] = $request->file($key);
            // penamaan file
            $data[$key] = auth()->user()->kode . '_' . $key . '.' . $file[$key]->getClientOriginalExtension();
            // upload
            $file[$key]->move($direktori, $data[$key]);
            // status
            $data['status_' . $key] = 'pending';
        }

        $berkas->update($data);

        alert()->success('Berhasil', 'Unggah Berkas Selesai');
        return back();
    }

    public function pengambilan()
    {
        $mahasiswa = Mahasiswa::where('user_id', auth()->user()->id)->has('wisuda')->with('wisuda.pengambilan')->first();
        // dd($mahasiswa);
        return view('students.pengambilan', compact('mahasiswa'));
    }
}
