@extends('layouts.app')
@section('content')
    <section class="panel">
        <div class="panel-body text-center">
            <div class="col-md-6">
                <a href="kelengkapan">Pengambilan</a>
            </div>
            <div class="col-md-6">
                <a href="return">Pengembalian</a>
            </div>
        </div>
        <br>

        <div class="panel">
            <header class="panel-heading">
                <h3 class="panel-title">Pengambilan Kelengkapan Wisuda</h3>
            </header>
            <div class="panel-body">
                <div class="panel-body">
                    <table class="table table-bordered table-striped mb-none" id="datatable-default">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama Mahasiswa</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>
                                <th>Jadwal Pengambilan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td> {{ $mhs->nim }} </td>
                                    <td>{{ $mhs->user->name }} </td>
                                    <td>{{ $mhs->prodi->fakultas->nama }}</td>
                                    <td>{{ $mhs->prodi->nama }}</td>
                                    <td>{{ \Carbon\Carbon::parse($mhs->wisuda->pengambilan->tgl_ambil)->format('j F Y') }}
                                    </td>
                                    <td class="text-center">
                                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary"
                                            href="#modalAnim">acc</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection

<div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Acc Pengambilan : Nama Mahasiswa</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p>Acc Pengambilan Kelengkapan dan Undangan : Nama Mahasiswa?</p>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-primary modal-confirm"
                        onclick="window.location='{{ url('admin/kelengkapan') }}'">Confirm</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
