@extends('layouts.head')
{{-- @extends('layouts.header') --}}
<section class="panel bg-primary">
    <div class="row">
        <div class="col-md-6">
            <div class="panel-body bg-primary" style="height:100vh; width:100vw; position: fixed;">
                <div style="width: 90vh; margin: 0% 25%; background-color:transparent" class="text-center">
                    <div class="">
                        <div class="row">
                            <h1>Sistem informasi Pendaftaran Wisuda</h1>
                            <div class="panel-body">
                                {{-- <div class="col-md-5 bg-primary">
                                    <h3 class="text-light">SISTEM INFORMASI PENDAFTARAN WISUDA</h3>
                                    <h3 class="text-light">DAN</h3>
                                    <h3 class="text-light">ARSIP ALUMNI</h3>
                                </div>
                                <div class="col-md-2"></div> --}}

                                <div class="col-md-12 bg-primary">
                                    <h3>INFORMASI PENDAFTARAN WISUDA</h3>
                                    <hr>
                                    @if (!is_null($periode) && !is_null($periode->pelaksanaan))
                                        <table class="table borderless" style="color: white">
                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Periode </h4>
                                                </td>
                                                <td>{{ $periode->nama }}</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Pendaftaran </h4>
                                                </td>
                                                <td>{{ $periode->pelaksanaan->pendaftaran }}</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Unggah dan Verifikasi berkas </h4>
                                                </td>
                                                <td>{{ $periode->pelaksanaan->verifikasi }}</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Pengambilan Kelengkapan </h4>
                                                </td>
                                                <td>{{ $periode->pelaksanaan->pengambilan }}</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Pelaksanaan Wisuda </h4>
                                                </td>
                                                <td>{{ $periode->pelaksanaan->pelaksanaan_wisuda }}</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Pengembalian Kelengkapan </h4>
                                                </td>
                                                <td>{{ $periode->pelaksanaan->pengembalian }}</td>
                                            </tr>
                                        </table>

                                    @else
                                        <table class="table table-borderless" style="color: white;">
                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Periode </h4>
                                                </td>
                                                <td>
                                                    <h4> - </h4>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Pendaftaran </h4>
                                                </td>
                                                <td>
                                                    <h4> - </h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Unggah dan Verifikasi Berkas </h4>
                                                </td>
                                                <td>
                                                    <h4> - </h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Pengambilan Kelengkapan </h4>
                                                </td>
                                                <td>
                                                    <h4> - </h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Pelaksanaan Wisuda </h4>
                                                </td>
                                                <td>
                                                    <h4> - </h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4 class="text-left">Pengembalian Kelengkapan </h4>
                                                </td>
                                                <td>
                                                    <h4> - </h4>
                                                </td>

                                            </tr>
                                        </table>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6" style="margin: 1% 25%">
                                <a href="{{ route('login') }}" class="btn btn-warning btn-lg btn-block">LOGIN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@include('layouts.footer')
