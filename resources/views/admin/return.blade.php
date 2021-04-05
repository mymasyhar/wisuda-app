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
                <h3 class="panel-title">{{ $title }}</h3>
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
                            <th>Batas Pengembalian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td> 16523171 </td>
                            <td>Masyhar Muharam </td>
                            <td>FTI</td>
                            <td>Informatika</td>
                            <td>29/03/2021</td>
                            <td> - </td>
                            <td class="text-center">
                                <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary" href="#modalAnim">acc</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                    <p>Acc Pengembalian Kelengkapan : Nama Mahasiswa?</p>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-primary modal-confirm"
                        onclick="window.location='{{ url('admin/return') }}'">Confirm</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
    </section>
</div>
