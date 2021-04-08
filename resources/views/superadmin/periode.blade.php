@extends('layouts.app')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Set Periode Wisuda</h2>
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
                            <th>Periode</th>
                            <th>Start Periode</th>
                            <th>End Periode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periode as $pr)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $pr->tahunajaran->tahun_ajaran }} </td>
                                <td> {{ $pr->nama }} </td>
                                <td> {{ \Carbon\Carbon::parse($pr->start)->format('j F Y') }} </td>
                                <td> {{ \Carbon\Carbon::parse($pr->end)->format('j F Y') }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="modalAnim" class="zoom-anim-dialog modal-block modal-block-primary mfp-hide">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">Periode Wisuda</h2>
                    </header>
                    <div class="panel-body">
                        <div class="modal-wrapper">
                            <form action="{{ route('superadmin.periodepost') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Tahun Ajaran</label>
                                    <div class="col-md-8">
                                        <select class="form-control mb-md" name="tahun_ajaran_id" id="ta">
                                            @foreach ($tahunajaran as $ta)
                                                <option value="{{ $ta->id }}"
                                                    data-periode="{{ $ta->periode->pluck('nama') }}"
                                                    data-mindate="{{ $ta->periode_terakhir_end_date ?? $ta->start_TA }}">
                                                    {{ $ta->tahun_ajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Periode</label>
                                    <div class="col-md-8">
                                        <select class="form-control mb-md" name="periode" id="periode">
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Jangka Waktu Periode</label>
                                    <div class="col-md-4">
                                        <input type="date" id="mulai_periode" name="mulai_periode" class="form-control"
                                            placeholder="Mulai" required />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="selesai_periode" name="selesai_periode" class="form-control"
                                            placeholder="Selesai" required />
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

@section('js')
    <script>
        $(document).ready(function() {
            var ta_id = $("#ta option:selected").val();
            var periode = $("#ta option:selected").data('periode')
            var min_date = $("#ta option:selected").data('mindate')
            console.log(min_date);
            addPeriode(periode)
            addMinDate(min_date)
        })

        $("#ta").on('change', function() {
            $("#periode").empty()

            var ta_id = $("#ta option:selected").val();
            var periode = $("#ta option:selected").data('periode')
            var min_date = $("#ta option:selected").data('mindate')
            console.log(min_date);
            addPeriode(periode)
            addMinDate(min_date)
        })

        function addPeriode(periode) {
            if ($.inArray("1", periode) !== -1) {
                $("#periode").append(`<option value="1" disabled>1</option>`)
            } else {
                $("#periode").append(`<option value="1">1</option>`)
            }
            if ($.inArray("2", periode) !== -1) {
                $("#periode").append(`<option value="2" disabled>2</option>`)
            } else {
                $("#periode").append(`<option value="2">2</option>`)
            }
            if ($.inArray("3", periode) !== -1) {
                $("#periode").append(`<option value="3" disabled>3</option>`)
            } else {
                $("#periode").append(`<option value="3">3</option>`)
            }
            if ($.inArray("4", periode) !== -1) {
                $("#periode").append(`<option value="4" disabled>4</option>`)
            } else {
                $("#periode").append(`<option value="4">4</option>`)
            }
        }

        function addMinDate(mindate) {
            $("#mulai_periode").attr('min', mindate)
            $("#selesai_periode").attr('min', mindate)
        }

    </script>
@endsection
