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
                                            href="#modalAnim{{ $mhs->id }}">acc</a>
                                    </td>
                                    <div id="modalAnim{{ $mhs->id }}"
                                        class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                        <section class="panel">
                                            <header class="panel-heading">
                                                <h2 class="panel-title">Acc Pengambilan : {{ $mhs->user->name }}</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-text">
                                                        <div class="panel-body">
                                                            <form
                                                                action="{{ route('admin.pengambilan', $mhs->wisuda->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="col-md-4 control-label"
                                                                        for="inputSuccess">Status Pengambilan</label>
                                                                    <div class="col-md-8">
                                                                        <select class="form-control mb-md" name="status">
                                                                            <option value="pinjam">Pinjam</option>
                                                                            <option value="beli">Beli</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12 text-right">
                                                                        <button class="btn btn-primary"
                                                                            type="submit">Confirm</button>
                                                                        <button
                                                                            class="btn btn-default modal-dismiss">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
