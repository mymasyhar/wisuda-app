@extends('layouts.head')
@extends('layouts.header')
<section class="panel bg-primary">
    <div class="panel-body bg-primary" style="margin-top: 40px; height:90vh; width:100vw; position: fixed;">
        <div style="width: 90vh; margin: 15% 25%; background-color:transparent" class="text-center">
            <div class="text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-light">SISTEM INFORMASI PENDAFTARAN WISUDA</h3>
                        <h3 class="text-light">DAN</h3>
                        <h3 class="text-light">ARSIP ALUMNI</h3>
                    </div>
                    <br>
                    <div class="col-md-6" style="margin: 5% 25%">
                        <a href="{{ route('login') }}" class="btn btn-warning btn-lg btn-block">LOGIN</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
