@extends('layouts.app')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Set Periode Wisuda</h2>
        </header>
        <div class="panel-body">
            <form class="form-horizontal form-bordered" method="post" action="add">

                @csrf

                <div class="form-group">
                    <label class="col-md-4 control-label" for="inputSuccess">Tahun Ajaran</label>
                    <div class="col-md-6">
                        <select class="form-control mb-md" name="tahunajaran">
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option>
                            <option value="2022/2023">2022/2023</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label" for="inputSuccess">Periode</label>
                    <div class="col-md-6">
                        <select class="form-control mb-md" name="periode">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Tanggal Pelaksanaan</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="date" class="form-control" name="tglpelaksanaan">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Pendaftaran</label>
                    <div class="col-md-8">
                        <div class="input-daterange input-group">
                            <input type="date" class="form-control" name="startdaftar">
                            <span class="input-group-addon">sampai</span>
                            <input type="date" class="form-control" name="enddaftar">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Pembayaran</label>
                    <div class="col-md-8">
                        <div class="input-daterange input-group">
                            <input type="date" class="form-control" name="startbayar">
                            <span class="input-group-addon">sampai</span>
                            <input type="date" class="form-control" name="endbayar">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Verifikasi Berkas</label>
                    <div class="col-md-8">
                        <div class="input-daterange input-group">
                            <input type="date" class="form-control" name="startverifikasi">
                            <span class="input-group-addon">sampai</span>
                            <input type="date" class="form-control" name="endverifikasi">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Pengambilan Kelengkapan</label>
                    <div class="col-md-8">
                        <div class="input-daterange input-group">
                            <input type="date" class="form-control" name="startpengambilan">
                            <span class="input-group-addon">sampai</span>
                            <input type="date" class="form-control" name="endpengambilan">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Pengembalian Kelengkapan</label>
                    <div class="col-md-8">
                        <div class="input-daterange input-group">
                            <input type="date" class="form-control" name="startpengembalian">
                            <span class="input-group-addon">sampai</span>
                            <input type="date" class="form-control" name="endpengembalian">
                        </div>
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
