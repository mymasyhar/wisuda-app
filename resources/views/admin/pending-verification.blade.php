@extends('layouts.app')
@section('content')
    <section class="panel">
        <div class="panel-body text-center">
            <div class="col-md-4">
                <a href="verification">On List</a>
            </div>
            <div class="col-md-4">
                <a href="pending">Pending</a>
            </div>
            <div class="col-md-4">
                <a href="verified">Verified</a>
            </div>
        </div>
        <br>

        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">{{ $title }}</h2>
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
                    <tr>
                        <td>1</td>
                        <td> 16523171</td>
                        <td>Masyhar Muharam</td>
                        <td>FTI</td>
                        <td>Informatika</td>
                        <td>29/03/2021</td>
                        <td><a href="detail" class="btn btn-primary">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
