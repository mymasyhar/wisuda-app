@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Set Periode Wisuda</h2>
                </header>
                <div class="panel-body">
                    <a class="mb-md btn btn-primary" href="/periodic/add">
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
                                <tr>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                    <td> - </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
