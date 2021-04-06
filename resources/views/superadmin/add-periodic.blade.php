@extends('layouts.app')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Set Periode Wisuda</h2>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered" method="post" action="">

                @csrf

                <div class="form-group">
                    <h5 class="col-md-3 text-center mt-xl" for="inputSuccess">Tahun Ajaran</h5>
                    <div class="col-md-9">
                        <select class="form-control" name="tahun_ajaran_id" id="tahun_ajaran_id">
                            @foreach ($tahunajaran as $ta)
                                <option value="{{ $ta->id }}">{{ $ta->tahunajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-md-4">
                        <small>tanggal mulai</small>
                        <input type="date" class="form-control" id="inputDefault" name="start_TA">
                    </div>
                    <div class="col-md-4">
                        <small>tanggal selesai</small>
                        <input type="date" class="form-control" id="inputDefault" name="end_TA">
                    </div> --}}
                </div>

                <div class="form-group">
                    <h5 class="col-md-3 text-center mt-xl" for="inputSuccess">Periode</h5>
                    <div class="col-md-9">
                        <select class="form-control" name="periode_id" id="periode_id">
                            @foreach ($periode as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        {{-- <select class="form-control" name="periode">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select> --}}
                    </div>

                    {{-- <div class="col-md-3">
                        <small>tanggal mulai</small>
                        <input type="date" class="form-control" id="inputDefault" name="start">
                    </div>
                    <div class="col-md-3">
                        <small>tanggal selesai</small>
                        <input type="date" class="form-control" id="inputDefault" name="end">
                    </div> --}}
                </div>

                <div class="form-group">
                    <h5 class="col-md-3 text-center mt-sm" for="inputSuccess">Tanggal Pelaksanaan</h5>
                    <div class="col-md-8">
                        <input type="date" class="form-control" name="tglpelaksanaan">
                    </div>
                </div>

                <div class="form-group">
                    <h5 class="col-md-3 text-center mt-xl" for="inputSuccess">Pendaftaran</h5>
                    <div class="col-md-4">
                        <small>tanggal mulai</small>
                        <input type="date" class="form-control" name="start_pendaftaran">
                    </div>
                    <div class="col-md-4">
                        <small>tanggal selesai</small>
                        <input type="date" class="form-control" name="end_pendaftaran">
                    </div>
                </div>

                <div class="form-group">
                    <h5 class="col-md-3 text-center mt-xl" for="inputSuccess">Verifikasi Berkas</h5>
                    <div class="col-md-4">
                        <small>tanggal mulai</small>
                        <input type="date" class="form-control" name="start_verifikasi">
                    </div>
                    <div class="col-md-4">
                        <small>tanggal selesai</small>
                        <input type="date" class="form-control" name="end_verifikasi">
                    </div>
                </div>

                <div class="form-group">
                    <h5 class="col-md-3 text-center mt-xl" for="inputSuccess">Pengambilan Kelengkapan</h5>
                    <div class="col-md-4">
                        <small>tanggal mulai</small>
                        <input type="date" class="form-control" name="start_pengambilan">
                    </div>
                    <div class="col-md-4">
                        <small>tanggal selesai</small>
                        <input type="date" class="form-control" name="end_pengambilan">
                    </div>
                </div>

                <div class="form-group">
                    <h5 class="col-md-3 text-center mt-xl" for="inputSuccess">Pengembalian Kelengkapan</h5>
                    <div class="col-md-4">
                        <small>tanggal mulai</small>
                        <input type="date" class="form-control" name="start_pengembalian">
                    </div>
                    <div class="col-md-4">
                        <small>tanggal selesai</small>
                        <input type="date" class="form-control" name="end_pengembalian">
                    </div>
                </div>

                <div class="form-group text-center">
                    <button class="mb-xs mt-xs mr-xs btn btn-primary text-center" type="submit"><i class="fa fa-plus"></i>
                        Tambah</button>
                </div>

            </form>
        </div>
    </section>

@endsection
