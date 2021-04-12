@extends('layouts.head')
@extends('layouts.header')
<section class="panel bg-primary">
    <div class="panel-body bg-primary" style="margin-top: 40px; height:90vh; width:100vw; position: fixed;">
        <div style="width: 90vh; margin: 15% 25%; background-color:transparent" class="text-center">
            <div class="text-center">
                <h3 class="text-light">SISTEM INFORMASI PENDAFTARAN WISUDA</h3>
                <h3 class="text-light">DAN</h3>
                <h3 class="text-light">ARSIP ALUMNI</h3>
            </div>
            <hr>
            <a href="{{ route('login') }}" class="btn btn-warning">LOGIN</a>
        </div>
    </div>
</section>
@include('layouts.footer')
