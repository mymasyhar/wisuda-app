@extends('layouts.app')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h3 class="panel-title">
                Detail Informasi Mahasiswa
            </h3>
        </header>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table mb-none table-bordered">
                    <tr>
                        <th>NIM</th>
                        <td class="text-center">{{ $mahasiswa->nim }}</td>
                    </tr>

                    <tr>
                        <th>Nama</th>
                        <td class="text-center">{{ $mahasiswa->user->name }}</td>
                    </tr>

                    <tr>
                        <th>Tempat/Tanggal Lahir</th>
                        <td class="text-center">{{ $mahasiswa->tempatlahir }},
                            {{ \Carbon\Carbon::parse($mahasiswa->tgllahir)->format('j F Y') }}</td>
                    </tr>

                    <tr>
                        <th>Fakultas / Prodi</th>
                        <td class="text-center">{{ $mahasiswa->prodi->fakultas->nama }} / {{ $mahasiswa->prodi->nama }}
                        </td>
                    </tr>

                    <tr>
                        <th>IPK</th>
                        <td class="text-center">{{ $mahasiswa->wisuda->ipk }}</td>
                    </tr>

                    <tr>
                        <th>Judul Tugas Akhir/Skripsi</th>
                        <td class="text-center">{{ $mahasiswa->wisuda->judulskripsi }}</td>
                    </tr>

                    <tr>
                        <th>Dosen Pembimbing I Tugas Akhir/Skripsi</th>
                        <td class="text-center">{{ $mahasiswa->wisuda->dosenpembimbing1 }}</td>
                    </tr>

                    <tr>
                        <th>Dosen Pembimbing II Tugas Akhir/Skripsi</th>
                        <td class="text-center">{{ $mahasiswa->wisuda->dosenpembimbing2 }}</td>
                    </tr>

                    <tr>
                        <th>Alamat Email</th>
                        <td class="text-center">{{ $mahasiswa->user->email }}</td>
                    </tr>

                    <tr>
                        <th>Alamat Asal</th>
                        <td class="text-center">{{ $mahasiswa->alamatasal }}</td>
                    </tr>

                    <tr>
                        <th>Nomor yang dapat dihubungi</th>
                        <td class="text-center">{{ $mahasiswa->wisuda->nohp }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <br>

        <header class="panel-heading">
            <h3 class="panel-title">
                Arsip Mahasiswa
            </h3>
        </header>
        <div class="panel-body">
            <div class="row">
                @foreach ($berkas as $k => $v)
                    <div class="col-md-3">
                        <a style="cursor: pointer"
                            onclick="showFile('{{ asset('img/berkas/' . $mahasiswa->nim . '/' . $v) }}')">{{ $k }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        function showFile(url) {
            var left = ((screen.width) - 600) / 2
            var top = ((screen.height) - 600) / 2
            window.open(url, 'popup', `width=600, height=600, left=${left}, top=${top}`)
        }

    </script>
@endsection
