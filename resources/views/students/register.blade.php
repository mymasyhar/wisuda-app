@extends('layouts.app')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Register Wisuda</h2>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered" method="POST" action="{{ url('/students/register') }}">

                @csrf
                <header class="panel-heading mb-lg">
                    <h2 class="panel-title">Data Pribadi</h2>
                </header>
                <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Nama Mahasiswa</label>
                    <div class="col-md-8">
                        <input type="text" value="{{ auth()->user()->name }}" id="inputReadOnly" class="form-control"
                            readonly="readonly">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Tempat dan Tanggal Lahir</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Tempat" value="{{ $mahasiswa->tempatlahir }}"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <input type="date" class="form-control" value="{{ $mahasiswa->tgllahir }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Fakultas / Jurusan </label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="{{ $mahasiswa->prodi->fakultas->nama }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" value="{{ $mahasiswa->prodi->nama }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Indeks Prestasi Kumulatif (IPK)</label>
                    <div class="col-md-8">
                        <input type="text" name="ipk" class="form-control" value="{{ $mahasiswa->wisuda->ipk ?? '' }}"
                            {{ is_null($mahasiswa->wisuda) ? '' : 'readonly' }}>
                        <small class="text-danger">Contoh: 3.5 (Gunakan titik sebagai pemisah)</small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Judul Tugas Akhir/Skripsi</label>
                    <div class="col-md-8">
                        <input type="text" name="judulskripsi" class="form-control"
                            value="{{ $mahasiswa->wisuda->judulskripsi ?? '' }}"
                            {{ is_null($mahasiswa->wisuda) ? '' : 'readonly' }}>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Dosen Pembimbing I, Skripsi/TA</label>
                    <div class="col-md-8">
                        <input type="text" name="dosenpembimbing1" class="form-control"
                            value="{{ $mahasiswa->wisuda->dosenpembimbing1 ?? '' }}"
                            {{ is_null($mahasiswa->wisuda) ? '' : 'readonly' }}>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Dosen Pembimbing II, Skripsi/TA</label>
                    <div class="col-md-8">
                        <input type="text" name="dosenpembimbing2" class="form-control"
                            value="{{ $mahasiswa->wisuda->dosenpembimbing2 ?? '' }}"
                            {{ is_null($mahasiswa->wisuda) ? '' : 'readonly' }}>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Alamat Email</label>
                    <div class="col-md-8">
                        <input type="email" class="form-control" value="{{ $mahasiswa->user->email }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">Alamat Asal</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $mahasiswa->alamatasal }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="nama">No Telp/HP yang dapat dihubungi</label>
                    <div class="col-md-8">
                        <input type="text" name="nohp" class="form-control" value="{{ $mahasiswa->wisuda->nohp ?? '' }}"
                            {{ is_null($mahasiswa->wisuda) ? '' : 'readonly' }}>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="col-md-3 control-label" for="nama">Pekerjaan saat ini</label>
                    <div class="col-md-8">
                        <input type="text" name="pekerjaan" class="form-control"
                            value="{{ $mahasiswa->wisuda->pekerjaan ?? '' }}"
                            {{ is_null($mahasiswa->wisuda) ? '' : 'readonly' }}>
                        <small class="text-danger">Kosongkan jika tidak atau belum bekerja</small>
                    </div>
                </div>

                <header class="panel-heading mb-lg mt-lg">
                    <h2 class="panel-title">Deposit Toga dan Kelengkapan Wisuda</h2>
                </header>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="inputSuccess">Kelengkapan Wisuda</label>
                    <div class="col-md-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="KW_toga" checked onclick="return false;">
                                Toga
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="KW_samir" checked onclick="return false;">
                                Samir
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="KW_bukualumni"
                                    {{ is_null($mahasiswa->wisuda) ? '' : ($mahasiswa->wisuda->KW_bukualumni == 1 ? 'checked' : '') }}
                                    onclick=" {{ is_null($mahasiswa->wisuda) ? 'return true;' : 'return false;' }}">
                                Buku Alumni
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center mb-5">
                        {{-- <button class="btn btn-primary" type="submit">Submit</button> --}}
                        <button class="btn btn-primary" type="submit"
                            {{ is_null($mahasiswa->wisuda) ? '' : 'disabled' }}>{{ is_null($mahasiswa->wisuda) ? 'Register' : 'Sudah Mendaftar' }}</button>
                    </div>
                </div>

            </form>
        </div>
    </section>


@endsection

@section('js')
    <script>
        // $("#fakultas").on("change", function() {
        //     var fakultas_id = $("#fakultas option:selected").val();
        //     $("#prodi option").attr('hidden', true)
        //     $(`#prodi option[data-fakultas="` + fakultas_id + `"]`).attr('hidden', false)

        // })

    </script>

@endsection
