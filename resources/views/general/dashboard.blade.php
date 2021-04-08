@extends('layouts.app')
@section('content')
    <section>
        <div class="row">
            <div class="col-md-5 bg-primary text-center">
                <h4>Assalamualaikum, {{ auth()->user()->name }}</h4>
                <h4>{{ auth()->user()->kode }}</h4>
                <h5>{{ auth()->user()->role }}</h5>
            </div>
        </div>
    </section>

@endsection
