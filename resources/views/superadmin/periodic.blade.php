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
                                    <th>Tahun Ajaran</th>
                                    <th>Periode</th>
                                    <th>Pelaksanaan</th>
                                    <th>Pendaftaran</th>
                                    <th>Verifikasi</th>
                                    <th>Pengambilan</th>
                                    <th>Pengembalian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tahunajaran as $item)
                                    <tr>
                                        <td>{{ $item->tahun_ajaran }}</td>
                                        <td>
                                            @foreach ($item->periode as $p)
                                                <p>{{ $p->nama }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->periode as $p)
                                                <p>{{ \Carbon\Carbon::parse($p->pelaksanaan->wisuda)->format('j F Y') }}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->periode as $p)
                                                <p>{{ $p->pelaksanaan->pendaftaran }}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->periode as $p)
                                                <p>{{ $p->pelaksanaan->verifikasi }}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->periode as $p)
                                                <p>{{ $p->pelaksanaan->pengambilan }}
                                                </p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($item->periode as $p)
                                                <p>{{ $p->pelaksanaan->pengembalian }}
                                                </p>
                                            @endforeach
                                        </td>
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
