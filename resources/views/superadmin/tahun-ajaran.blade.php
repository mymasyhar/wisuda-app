@extends('layouts.app')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Set Tahun Ajaran</h2>
        </header>
        <div class="panel-body">
            <a href="#modalAnim" class="btn btn-primary modal-with-zoom-anim">Tambah</a>
            <hr>

            <div class="table-responsive">
                <table class="table table-bordered mb-none">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Tahun Ajaran</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tahunajaran as $ta)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $ta->tahun_ajaran }} </td>
                                <td> {{ \Carbon\Carbon::parse($ta->start_TA)->format('j F Y') }} </td>
                                <td> {{ \Carbon\Carbon::parse($ta->end_TA)->format('j F Y') }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Tambah Tahun Ajaran</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper text-center">

                            <form action="{{ route('superadmin.tahunajaranpost') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Tahun Ajaran</label>
                                    <div class="col-md-4">
                                        <input type="date" name="start_TA" min="{{ $end }}" class="form-control"
                                            placeholder="Mulai" required />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" name="end_TA"
                                            min="{{ \Carbon\Carbon::parse($end)->addYear()->format('Y-m-d') }}"
                                            class="form-control" placeholder="Selesai" required />
                                    </div>
                                </div>
                                <div class=" form-group mt-lg">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary" type="submit">Confirm</button>
                                        <button class="btn btn-default modal-dismiss">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </section>

@endsection
