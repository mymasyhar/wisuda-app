@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Set Pelaksanaan Wisuda</h2>
                </header>
                <div class="panel-body">
                    <a class="mb-md btn btn-primary" href="/superadmin/periodic/add">
                        Add
                    </a>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-none">
                            <thead>
                                <tr>
                                    <th class="text-center">Tahun Ajaran</th>
                                    <th class="text-center">Periode</th>
                                    <th class="text-center">Pelaksanaan Wisuda</th>
                                    <th class="text-center">Pendaftaran</th>
                                    <th class="text-center">Unggah Berkas dan Verifikasi</th>
                                    <th class="text-center">Pengambilan Kelengkapan</th>
                                    <th class="text-center">Pengembalian Kelengkapan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periode as $item)
                                    <tr>
                                        <td>{{ $item->tahunajaran->tahun_ajaran }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->pelaksanaan->wisuda)->format('j F Y') }} </td>
                                        <td>{{ $item->pelaksanaan->pendaftaran }} </td>
                                        <td>{{ $item->pelaksanaan->verifikasi }} </td>
                                        <td>{{ $item->pelaksanaan->pengambilan }} </td>
                                        <td>{{ $item->pelaksanaan->pengembalian }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
