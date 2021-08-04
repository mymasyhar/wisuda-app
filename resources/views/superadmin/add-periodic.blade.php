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
                    <div class="col-md-8">
                        <select class="form-control" name="tahun_ajaran_id" id="ta">
                            @foreach ($tahunajaran as $ta)
                                <option value="{{ $ta->id }}" data-periode="{{ $ta->periode->pluck('nama') }}"
                                    data-mindate="{{ $ta->periode_terakhir_start_date }}"
                                    data-maxdate={{ $ta->periode_terakhir_end_date }}>{{ $ta->tahunajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <h5 class="col-md-3 text-center mt-xl" for="inputSuccess">Periode</h5>
                    <div class="col-md-8">
                        <select class="form-control" name="periode_id" id="periode"></select>
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
                    <h5 class="col-md-3 text-center mt-xl" for="inputSuccess">Unggah dan Verifikasi Berkas</h5>
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
                    <h5 class="col-md-3 text-center mt-sm" for="inputSuccess">Tanggal Pelaksanaan</h5>
                    <div class="col-md-8">
                        <input type="date" class="form-control" name="tglpelaksanaan">
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
@section('js')
    <script>
        $(document).ready(function() {
            var ta_id = $("#ta option:selected").val();
            var periode = $("#ta option:selected").data('periode')
            var min_date = $("#ta option:selected").data('mindate')
            var max_date = $("#ta option:selected").data('maxdate')
            addPeriode(periode)
            addMinDate(min_date, max_date)
        })

        $("#ta").on('change', function() {
            $("#periode").empty()

            var ta_id = $("#ta option:selected").val();
            var periode = $("#ta option:selected").data('periode')
            var min_date = $("#ta option:selected").data('mindate')
            var max_date = $("#ta option:selected").data('maxdate')

            addPeriode(periode)
            addMinDate(min_date, max_date)
        })

        $("#periode").on('change', function() {
            var ta_id = $("#ta option:selected").val();
            var periode_id = $("#periode option:selected").val()
            $.ajax({
                url: '/api/periode-by-ta/' + ta_id + '/' + periode_id,
                method: "GET",
            }).done(function(res) {
                var start = res.start
                var end = res.end
                addMinDate(start, end)

            })
        })

        function addPeriode(periode) {
            if ($.inArray("1", periode) !== -1) {
                $("#periode").append(`<option value="1">1</option>`)
            }
            if ($.inArray("2", periode) !== -1) {
                $("#periode").append(`<option value="2">2</option>`)
            }
            if ($.inArray("3", periode) !== -1) {
                $("#periode").append(`<option value="3">3</option>`)
            }
            if ($.inArray("4", periode) !== -1) {
                $("#periode").append(`<option value="4">4</option>`)
            }
        }

        function addMinDate(mindate, maxdate) {
            $("input[type='date']").attr('min', mindate)
            $("input[type='date']").attr('max', maxdate)
        }
    </script>
@endsection
