@extends('layouts.app')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Pengembalian Kelengkapan</h2>
        </header>
        @if (!is_null($mahasiswa))
            @if (!is_null($mahasiswa->wisuda->pengembalian))
                <div class="row show-grid">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <section class="panel">
                            <header class="panel-heading bg-info">
                                <h4 class="panel-title text-center" style="color: white">Status</h4>
                            </header>
                            <div class="panel-body bg-primary">
                                <div class="panel-heading-icon">
                                    <i
                                        class="fa fa-{{ !is_null($mahasiswa->wisuda->pengembalian) ? ($mahasiswa->wisuda->pengembalian->status == 'selesai' ? 'check' : 'times') : 'times' }}"></i>
                                </div>
                                <br>
                                <h3 class="text-semibold mt-none text-center">
                                    {{ !is_null($mahasiswa->wisuda->pengembalian) ? ($mahasiswa->wisuda->pengembalian->status == 'selesai' ? 'Selesai' : 'Belum Kembali') : 'Belum Kembali' }}
                                </h3>
                                @if (!is_null($mahasiswa->wisuda->pengembalian) && $mahasiswa->wisuda->pengembalian->status == 'pinjam')
                                    <h6 class="text-center"> * jika pengembalian lebih dari maksimal tanggal pengembalian,
                                        dianggap
                                        membeli</h6>
                                @endif
                            </div>
                        </section>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <section class="panel">
                            <header class="panel-heading bg-info">
                                <h4 class="panel-title text-center" style="color: white">Informasi Pengembalian</h4>
                            </header>
                            <div class="panel-body bg-primary">
                                <div class="col-md-6 text-center">
                                    <div class="panel-heading-icon bg-primary">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <h4><b>Lokasi</b></h4>
                                    <p>Gedung Rektorat UII Lt.3</p>
                                </div>

                                <div class="col-md-6 text-center">
                                    <div class="panel-heading-icon bg-primary">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <h4><b>Tanggal</b></h4>
                                    <p>{{ is_null($mahasiswa->wisuda->pengembalian) ? $mahasiswa->wisuda->periode->pelaksanaan->pengembalian : ($mahasiswa->wisuda->pengembalian->status == 'selesai' ? \Carbon\Carbon::parse($mahasiswa->wisuda->pengembalian->tgl_pengembalian)->format('j F Y') : $mahasiswa->wisuda->periode->pelaksanaan->pengembalian) }}
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            @endif
        @else
            <div class="panel-body text-center">
                <h4 class="text-center">Anda belum melakukan pendaftaran</h4>
                <a href="" class="btn btn-primary">Daftar Wisuda</a>
            </div>
        @endif
    </section>


@endsection
