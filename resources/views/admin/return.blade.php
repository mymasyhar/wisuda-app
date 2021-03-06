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
                <h3 class="panel-title">{{ $title ?? 'Pengembalian Kelengkapan Wisuda' }}</h3>
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
                        @foreach ($mahasiswa as $mhs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $mhs->nim }} </td>
                                <td>{{ $mhs->user->name }}</td>
                                <td>{{ $mhs->prodi->fakultas->nama }}</td>
                                <td>{{ $mhs->prodi->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($mhs->wisuda->periode->pelaksanaan->end_pengembalian)->format('j F Y') }}
                                </td>
                                <td>{{ $mhs->wisuda->pengembalian->status }}</td>
                                <td class="text-center">
                                    @if ($mhs->wisuda->pengembalian->status == 'pinjam')

                                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary"
                                            href="#modalAnim{{ $mhs->id }}">acc</a>
                                    @elseif ($mhs->wisuda->pengembalian->status == 'selesai')
                                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#"
                                            disabled>Dikembalikan</a>

                                    @else
                                        <a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-success" href="#"
                                            disabled>Dibeli</a>
                                    @endif
                                </td>

                                <div id="modalAnim{{ $mhs->id }}"
                                    class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                                    <section class="panel">
                                        <form action="{{ route('admin.accpengembalian', $mhs->wisuda->pengembalian) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')

                                            <header class="panel-heading">
                                                <h2 class="panel-title">Acc Pengambilan : {{ $mhs->user->name }}</h2>
                                            </header>
                                            <div class="panel-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-text">
                                                        <p>Acc Pengembalian Kelengkapan : {{ $mhs->user->name }}?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <button class="btn btn-primary" type="submit">Confirm</button>
                                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                                    </div>
                                                </div>
                                            </footer>
                                        </form>
                                    </section>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
