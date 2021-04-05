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
        <div class="panel-body">
            <header>
                <h3 class="panel-title">Status {{ $title }}</h3>
            </header>
        </div>
    </section>


@endsection
