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
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Dokumen Terverifikasi</h2>
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
                        <th>Tanggal Acc</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $mhs)
                        @if ($mhs->wisuda->berkas->status() == 'acc')

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->user->name }}</td>
                                <td>{{ $mhs->prodi->fakultas->nama }}</td>
                                <td>{{ $mhs->prodi->nama }}</td>
                                <td>{{ $mhs->wisuda->berkas->created_at->format('j F Y') }}</td>
                                <td>{{ $mhs->wisuda->berkas->updated_at->format('j F Y') }}</td>
                                <td>
                                    <p class="text-success">Selesai</p>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
@endsection
