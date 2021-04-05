@extends('layouts.app')
@section('content')
    <section class="panel">
        <div class="panel-body text-center">
            <div class="col-md-6">
                <a href="verification">On List</a>
            </div>
            {{-- <div class="col-md-4">
                <a href="pending">Pending</a>
            </div> --}}
            <div class="col-md-6">
                <a href="verified">Verified</a>
            </div>
        </div>
        <br>

        <header class="panel-heading">

            <h2 class="panel-title">Verifikasi Berkas Pendaftar</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                        @if ($dt->wisuda->berkas->status() != 'acc')

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dt->user->kode }}</td>
                                <td>{{ $dt->user->name }}</td>
                                <td>{{ $dt->prodi->fakultas->nama }}</td>
                                <td>{{ $dt->prodi->nama }}</td>
                                <td>{{ $dt->wisuda->berkas->created_at->format('j F Y') }}</td>
                                <td><a href="{{ url('/admin/verification/detail', $dt->nim) }}"
                                        class="btn btn-primary">Detail</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
