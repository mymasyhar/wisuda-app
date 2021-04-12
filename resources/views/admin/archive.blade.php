@extends('layouts.app')
@section('content')
    <section class="panel">
        <div class="panel-body">
            <div class="row" style="margin-bottom: 2rem">
                <form action="{{ route('admin.archive') }}" method="GET">
                    <div class="col-md-4">
                        <small class="col-md-12 control-label" for="inputSuccess">Tahun Ajaran</small>
                        <select class="form-control" name="tahun_ajaran_id" id="ta">
                            @foreach ($tahunajaran as $ta)
                                <option value="{{ $ta->id }}" data-periode="{{ $ta->periode->pluck('nama') }}"
                                    data-mindate="{{ $ta->periode_terakhir_start_date }}"
                                    data-maxdate={{ $ta->periode_terakhir_end_date }}
                                    {{ app('request')->input('tahun_ajaran_id') == $ta->id ? 'selected' : '' }}>
                                    {{ $ta->tahunajaran }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <small class="col-md-12 control-label" for="inputSuccess">Periode</small>
                        <select class="form-control" name="periode_id" id="periode"></select>
                    </div>

                    <div class="col-md-4">
                        <small class="col-md-12 invisible">-</small>
                        <button class="btn btn-primary">Filter</button>
                    </div>
                </form>
            </div>

            <hr>

            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wisuda as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mahasiswa->nim }}</td>
                            <td>{{ $item->mahasiswa->user->name }}</td>
                            <td>{{ $item->mahasiswa->prodi->fakultas->nama }}</td>
                            <td>{{ $item->mahasiswa->prodi->nama }}</td>
                            <td><a href="{{ route('admin.archive-detail', $item->mahasiswa->id) }}"
                                    class="btn btn-primary">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var ta_id = $("#ta option:selected").val();
            var periode = $("#ta option:selected").data('periode')
            addPeriode(periode)
        })

        $("#ta").on('change', function() {
            $("#periode").empty()

            var ta_id = $("#ta option:selected").val();
            var periode = $("#ta option:selected").data('periode')

            addPeriode(periode)
        })

        function addPeriode(periode) {
            if ($.inArray("1", periode) !== -1) {
                $("#periode").append(
                    `<option value="1" {{ app('request')->input('periode_id') == 1 ? 'selected' : '' }}>1</option>`)
            }
            if ($.inArray("2", periode) !== -1) {
                $("#periode").append(
                    `<option value="2" {{ app('request')->input('periode_id') == 2 ? 'selected' : '' }}>2</option>`)
            }
            if ($.inArray("3", periode) !== -1) {
                $("#periode").append(
                    `<option value="3" {{ app('request')->input('periode_id') == 3 ? 'selected' : '' }}>3</option>`)
            }
            if ($.inArray("4", periode) !== -1) {
                $("#periode").append(
                    `<option value="4" {{ app('request')->input('periode_id') == 4 ? 'selected' : '' }}>4</option>`)
            }
        }

    </script>
@endsection
