@extends('layouts.head')
@extends('layouts.header')
<section class="panel bg-primary">
    <div class="row">
        <div class="col-md-6">
            <div class="panel-body bg-primary" style="height:100vh; width:100vw; position: fixed;">
                <div style="width: 90vh; margin: 15% 25%; background-color:transparent" class="text-center">
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
                                        <h4 class="text-left">Periode Wisuda :
                                            {{ $periode->nama }}</h4>
                                        <h4 class="text-left">Periode Pendaftaran :
                                            {{ $periode->pelaksanaan->pendaftaran }}
                                        </h4>
                                        <h4 class="text-left">Verifikasi berkas :
                                            {{ $periode->pelaksanaan->verifikasi }}
                                        </h4>
                                        <h4 class="text-left">Pengambilan Kelengkapan :
                                            {{ $periode->pelaksanaan->pengambilan }}
                                        </h4>
                                        <h4 class="text-left">Wisuda :
                                            {{ $periode->pelaksanaan->wisuda }}
                                        </h4>
                                        <h4 class="text-left">Wisuda :
                                            {{ $periode->pelaksanaan->pengembalian }}
                                        </h4>

                                    @else
                                        <h4 class="text-left">Periode Wisuda : - </h4>
                                        <h4 class="text-left">Periode Pendaftaran :- </h4>
                                        <h4 class="text-left">Verifikasi berkas : - </h4>
                                        <h4 class="text-left">Pengambilan Kelengkapan : - </h4>
                                        <h4 class="text-left">Wisuda : - </h4>
                                        <h4 class="text-left">Wisuda : - </h4>
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
