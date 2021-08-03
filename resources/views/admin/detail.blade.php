@extends('layouts.app')
@section('content')
    <section class="panel">

        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>

            <h2 class="panel-title">Berkas Pendaftar : </h2>
        </header>


        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="tabs">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#pasfoto" data-toggle="tab" class="text-center">
                                    {{-- <i class="fa fa-star"></i> --}}
                                    Pas <br> Foto <br>
                                    <i
                                        class="fa fa-{{ $data->wisuda->berkas->status_pasfoto == 'acc' ? 'check' : 'warning' }}">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a href="#scanktp" data-toggle="tab" class="text-center ">Scan <br> KTP <br>
                                    <i
                                        class="fa fa-{{ $data->wisuda->berkas->status_scanktp == 'acc' ? 'check' : 'warning' }}">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a href="#scanbebasperpustakaan" data-toggle="tab" class="text-center">Scan Surat Bebas
                                    Perpustakaan <br>
                                    <i
                                        class="fa fa-{{ $data->wisuda->berkas->status_bebasperpustakaan == 'acc' ? 'check' : 'warning' }}">
                                    </i>
                                </a>
                            </li>
                            <li>
                                <a href="#scantoefl" data-toggle="tab" class="text-center">Scan Sertifikat TOEFL/CEPT<br>
                                    <i
                                        class="fa fa-{{ $data->wisuda->berkas->status_toeflcept == 'acc' ? 'check' : 'warning' }}">
                                    </i>

                                </a>
                            </li>
                            <li>
                                <a href="#scanbuktiskripsi" data-toggle="tab" class="text-center">Penyerahan Skripsi <br>
                                    <i
                                        class="fa fa-{{ $data->wisuda->berkas->status_buktiskripsi == 'acc' ? 'check' : 'warning' }}">
                                    </i>

                                </a>
                            </li>
                            <li>
                                <a href="#scanpengesahan" data-toggle="tab" class="text-center">Pengesahan Skripsi <br>
                                    <i
                                        class="fa fa-{{ $data->wisuda->berkas->status_pengesahanskripsi == 'acc' ? 'check' : 'warning' }}">
                                    </i>

                                </a>
                            </li>
                            <li>
                                <a href="#scanpembayaran" data-toggle="tab" class="text-center">Scan Bukti Pembayaran <br>
                                    <i
                                        class="fa fa-{{ $data->wisuda->berkas->status_pembayaranpendaftaran == 'acc' ? 'check' : 'warning' }}">
                                    </i>

                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="pasfoto" class="tab-pane active">
                                <p>Pas Foto</p>
                                <img src="{{ asset('img/berkas/' . $data->nim . '/' . $data->wisuda->berkas->pasfoto) }}"
                                    alt="pasfoto">
                            </div>
                            <div id="scanktp" class="tab-pane">
                                <p>Scan KTP </p>
                                <embed width="800px" height="1000px"
                                    src="{{ asset('img/berkas/' . $data->nim . '/' . $data->wisuda->berkas->scanktp) }}"
                                    alt="scanktp">
                            </div>
                            <div id="scanbebasperpustakaan" class="tab-pane">
                                <p>Scan Surat Bebas Perpustakaan</p>
                                <embed width="800px" height="1000px"
                                    src="{{ asset('img/berkas/' . $data->nim . '/' . $data->wisuda->berkas->bebasperpustakaan) }}"
                                    alt="bebasperpustakaan">
                            </div>
                            <div id="scantoefl" class="tab-pane">
                                <p>Scan Sertifikat TOEFL / CEPT</p>
                                <embed width="800px" height="1000px"
                                    src="{{ asset('img/berkas/' . $data->nim . '/' . $data->wisuda->berkas->toeflcept) }}"
                                    alt="toeflcept">
                            </div>
                            <div id="scanbuktiskripsi" class="tab-pane">
                                <p>Scan Bukti Penyerahan Skripsi</p>
                                <embed width="800px" height="1000px"
                                    src="{{ asset('img/berkas/' . $data->nim . '/' . $data->wisuda->berkas->buktiskripsi) }}"
                                    alt="buktiskripsi">
                            </div>
                            <div id="scanpengesahan" class="tab-pane">
                                <p>Scan Bukti Pengesahan Skripsi</p>
                                <embed width="800px" height="1000px"
                                    src="{{ asset('img/berkas/' . $data->nim . '/' . $data->wisuda->berkas->pengesahanskripsi) }}"
                                    alt="pengesahanskripsi">
                            </div>
                            <div id="scanpembayaran" class="tab-pane">
                                <p>Scan Bukti Pembayaran Pendaftaran</p>
                                <embed width="800px" height="1000px"
                                    src="{{ asset('img/berkas/' . $data->nim . '/' . $data->wisuda->berkas->pembayaranpendaftaran) }}"
                                    alt="pembayaranpendaftaran">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 text-center">
                            <a href="{{ $data->wisuda->berkas->status() == 'acc' ? '#' : '#modalAnim' }}"
                                class="btn btn-primary modal-with-zoom-anim"
                                {{ $data->wisuda->berkas->status() == 'acc' ? 'disabled' : '' }}>{{ $data->wisuda->berkas->status() == 'acc' ? 'Terverifikasi' : 'Verifikasi' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

<div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Acc Pengajuan : {{ $data->user->name }}</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-text col-md-12 text-center">
                    <form class="form-horizontal form-bordered" method="post"
                        action="{{ route('admin.verifikasidokumen', $data->wisuda->berkas) }}">
                        @csrf

                        <input type="hidden" value="{{ $data->wisuda->id }}" name="wisuda_id">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="inputSuccess">Pas Foto</label>
                            <div class="col-md-8">
                                <select class="form-control mb-md" name="status_pasfoto" id="status_pasfoto">
                                    <option value="acc"
                                        {{ $data->wisuda->berkas->status_pasfoto == 'acc' ? 'selected' : '' }}>Accept
                                    </option>
                                    <option value="revisi"
                                        {{ $data->wisuda->berkas->status_pasfoto != 'acc' ? 'selected' : '' }}>Revisi
                                    </option>
                                </select>
                            </div>

                            <label class="col-md-4 control-label" for="inputSuccess">Scan KTP</label>
                            <div class="col-md-8">
                                <select class="form-control mb-md" name="status_scanktp" id="status_scanktp">
                                    <option value="acc"
                                        {{ $data->wisuda->berkas->status_scanktp == 'acc' ? 'selected' : '' }}>Accept
                                    </option>
                                    <option value="revisi"
                                        {{ $data->wisuda->berkas->status_scanktp != 'acc' ? 'selected' : '' }}>Revisi
                                    </option>
                                </select>
                            </div>

                            <label class="col-md-4 control-label" for="inputSuccess">Surat Bebas Perpustakaan</label>
                            <div class="col-md-8">
                                <select class="form-control mb-md" name="status_bebasperpustakaan"
                                    id="status_bebasperpustakaan">
                                    <option value="acc"
                                        {{ $data->wisuda->berkas->status_bebasperpustakaan == 'acc' ? 'selected' : '' }}>
                                        Accept
                                    </option>
                                    <option value="revisi"
                                        {{ $data->wisuda->berkas->status_bebasperpustakaan != 'acc' ? 'selected' : '' }}>
                                        Revisi
                                    </option>
                                </select>
                            </div>

                            <label class="col-md-4 control-label" for="inputSuccess">Sertifikat TOEFL / CEPT</label>
                            <div class="col-md-8">
                                <select class="form-control mb-md" name="status_toeflcept" id="status_toeflcept">
                                    <option value="acc"
                                        {{ $data->wisuda->berkas->status_toeflcept == 'acc' ? 'selected' : '' }}>
                                        Accept
                                    </option>
                                    <option value="revisi"
                                        {{ $data->wisuda->berkas->status_toeflcept != 'acc' ? 'selected' : '' }}>
                                        Revisi
                                    </option>
                                </select>
                            </div>

                            <label class="col-md-4 control-label" for="inputSuccess">Bukti Penyerahan Skripsi</label>
                            <div class="col-md-8">
                                <select class="form-control mb-md" name="status_buktiskripsi" id="status_buktiskripsi">
                                    <option value="acc"
                                        {{ $data->wisuda->berkas->status_buktiskripsi == 'acc' ? 'selected' : '' }}>
                                        Accept
                                    </option>
                                    <option value="revisi"
                                        {{ $data->wisuda->berkas->status_buktiskripsi != 'acc' ? 'selected' : '' }}>
                                        Revisi
                                    </option>
                                </select>
                            </div>

                            <label class="col-md-4 control-label" for="inputSuccess">Bukti Pengesahan Skripsi</label>
                            <div class="col-md-8">
                                <select class="form-control mb-md" name="status_pengesahanskripsi"
                                    id="status_pengesahanskripsi">
                                    <option value="acc"
                                        {{ $data->wisuda->berkas->status_pengesahanskripsi == 'acc' ? 'selected' : '' }}>
                                        Accept
                                    </option>
                                    <option value="revisi"
                                        {{ $data->wisuda->berkas->status_pengesahanskripsi != 'acc' ? 'selected' : '' }}>
                                        Revisi
                                    </option>
                                </select>
                            </div>

                            <label class="col-md-4 control-label" for="inputSuccess">Bukti Pembayaran
                                Pendaftaran</label>
                            <div class="col-md-8">
                                <select class="form-control mb-md" name="status_pembayaranpendaftaran"
                                    id="status_pembayaranpendaftaran">
                                    <option value="acc"
                                        {{ $data->wisuda->berkas->status_pembayaranpendaftaran == 'acc' ? 'selected' : '' }}>
                                        Accept
                                    </option>
                                    <option value="revisi"
                                        {{ $data->wisuda->berkas->status_pembayaranpendaftaran != 'acc' ? 'selected' : '' }}>
                                        Revisi
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="tgl-pengambilan">
                            <label class="col-md-4 control-label">Tanggal Pengambilan</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        {{-- <i class="fa fa-calendar"></i> --}}
                                    </span>
                                    <input type="date" class="form-control" name="tgl_ambil"
                                        min="{{ $pelaksanaan->start_pengambilan }}"
                                        max="{{ $pelaksanaan->end_pengambilan }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center col-md-12">
                            <button class="btn btn-primary text-right" type="submit">Confirm</button>
                            <button class="btn btn-default modal-dismiss text-right">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@section('js')
    <script>
        $(document).ready(function() {
            showTanggal()
        })

        $('#status_pasfoto').on('change', function() {
            showTanggal()
        })
        $('#status_scanktp').on('change', function() {
            showTanggal()
        })
        $('#status_bebasperpustakaan').on('change', function() {
            showTanggal()
        })
        $('#status_toeflcept').on('change', function() {
            showTanggal()
        })
        $('#status_buktiskripsi').on('change', function() {
            showTanggal()
        })
        $('#status_pengesahanskripsi').on('change', function() {
            showTanggal()
        })
        $('#status_pembayaranpendaftaran').on('change', function() {
            showTanggal()
        })

        function showTanggal() {
            var pasfoto = $("#status_pasfoto option:selected").val();
            var scanktp = $("#status_scanktp option:selected").val();
            var bebasperpustakaan = $("#status_bebasperpustakaan option:selected").val();
            var toeflcept = $("#status_toeflcept option:selected").val();
            var buktiskripsi = $("#status_buktiskripsi option:selected").val();
            var pengesahanskripsi = $("#status_pengesahanskripsi option:selected").val();
            var pembayaranpendaftaran = $("#status_pembayaranpendaftaran option:selected").val();

            if (pasfoto == 'acc' && scanktp == 'acc' && bebasperpustakaan == 'acc' && toeflcept == 'acc' && buktiskripsi ==
                'acc' && pengesahanskripsi == 'acc' && pembayaranpendaftaran == 'acc') {
                $("#tgl-pengambilan").attr('hidden', false)
            } else {
                $("#tgl-pengambilan").attr('hidden', true)
            }
        }
    </script>
@endsection
