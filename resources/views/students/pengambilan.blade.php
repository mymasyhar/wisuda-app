@extends('layouts.app')
@section('content')
    <section class="panel">
        <div class="panel-body text-center">
            <div class="col-md-6">
                <a href="pengambilan">Pengambilan</a>
            </div>
            <div class="col-md-6">
                <a href="pengembalian">Pengembalian</a>
            </div>
        </div>
        <br>

        <header>
            <h3 class="panel-title">Jadwal Pengambilan</h3>
        </header>
        <br>


        <div class="row show-grid">
            <div class="col-md-4 col-lg-4 col-xl-3">
                <section class="panel">
                    <header class="panel-heading bg-info">
                        <h4 class="panel-title text-center" style="color: white">Status</h4>
                    </header>
                    <div class="panel-body bg-primary">
                        <br>
                        <div class="panel-heading-icon bg-info">
                            <i
                                class="fa fa-{{ $mahasiswa ? ($mahasiswa->wisuda->berkas->status() == 'pending' ? 'clock-o' : 'check') : 'times' }}"></i>
                        </div>
                        <br>
                        <h3 class="text-semibold mt-none text-center">
                            {{ $mahasiswa ? ($mahasiswa->wisuda->berkas->status() == 'pending' ? 'Berkas Dalam Tahap Verifikasi' : 'Berkas Diterima') : 'Anda belum melakukan Unggah Berkas' }}
                        </h3>
                        <p class="text-center">
                            {{ $mahasiswa ? ($mahasiswa->wisuda->berkas->status() == 'pending' ? 'Berkas dalam Tahap Verifikasi' : 'Pengambilan dapat dilakukan') : 'Silahkan Unggah Berkas' }}
                        </p>
                    </div>
                </section>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-3">
                <section class="panel">
                    <header class="panel-heading bg-info">
                        <h4 class="panel-title text-center" style="color: white">Status</h4>
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
                            <p>{{ \Carbon\Carbon::parse($mahasiswa->wisuda->pengambilan->tgl_ambil)->format('j F Y') }}
                            </p>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-4 col-lg-4 col-xl-3">
                <section class="panel">
                    <header class="panel-heading bg-info">
                        <h4 class="panel-title text-center" style="color: white">Status</h4>
                    </header>

                    <div class="panel-body bg-primary">
                        <p>1. {{ $mahasiswa->wisuda->KW_toga == '1' ? 'Toga' : '' }}</p>
                        <p>2. {{ $mahasiswa->wisuda->KW_samir == '1' ? 'Samir' : '' }}</p>
                        @if ($mahasiswa->wisuda->KW_bukualumni == '1')
                            <p>3. Buku Alumni</p>
                        @endif
                    </div>
                </section>
            </div>
        </div>

    </section>
@endsection
