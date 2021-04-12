@extends('layouts.app')
@section('content')
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Unggah Berkas Pendaftaran</h2>
        </header>
        @if ($verifikasi)
            @if (!$berkas)
                @if (!$mahasiswa->wisuda->berkas)
                    <div class="panel-body">
                        <br>
                        <form class="form-horizontal form-bordered" enctype="multipart/form-data" method="post"
                            action="{{ url('students/file-upload') }}">
                            @csrf
                            <input type="hidden" value="{{ $mahasiswa->wisuda->id }}" name="wisuda_id">
                            <div class="form-group text-center">
                                <label class="col-md-3 control-label text-center">
                                    Pas Foto <br>
                                    <span><small class="text-danger"> ( Format jpg,png,jpeg )</small></span>
                                </label>

                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="pasfoto" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <label class="col-md-3 control-label text-center">
                                    Scan KTP <br>
                                    <span><small class="text-danger"> ( Format PDF )</small></span>
                                </label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="scanktp" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <label class="col-md-3 control-label">
                                    Surat Bebas Perpustakaan <br>
                                    <span><small class="text-danger"> ( Format PDF )</small></span>
                                </label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="bebasperpustakaan" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <label class="col-md-3 control-label">
                                    Scan Sertifikat TOEFL/CEPT <br>
                                    <span><small class="text-danger"> ( Format PDF )</small></span>
                                </label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="toeflcept" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <label class="col-md-3 control-label">
                                    Scan Bukti Penyerahan Skripsi <br>
                                    <span><small class="text-danger"> ( Format PDF )</small></span>
                                </label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="buktiskripsi" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <label class="col-md-3 control-label">
                                    Scan Lembar Pengesahan Skripsi <br>
                                    <span><small class="text-danger"> ( Format PDF )</small></span>
                                </label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="pengesahanskripsi" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <label class="col-md-3 control-label">
                                    Scan Bukti Pembayaran Pendaftaran <br>
                                    <span><small class="text-danger"> ( Format PDF )</small></span>

                                </label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="input-append">
                                            <div class="uneditable-input">
                                                <i class="fa fa-file fileupload-exists"></i>
                                                <span class="fileupload-preview"></span>
                                            </div>
                                            <span class="btn btn-default btn-file">
                                                <span class="fileupload-exists">Change</span>
                                                <span class="fileupload-new">Select file</span>
                                                <input type="file" name="pembayaranpendaftaran" />
                                            </span>
                                            <a href="#" class="btn btn-default fileupload-exists"
                                                data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    @if ($mahasiswa->wisuda->berkas->status() == 'acc')
                        <div class="panel-body text-center">
                            <h4 class="">Berkas Diterima.</h4>
                            <h4 class="">Periksa tanggal pengambilan pada menu Penjadwalaan > Pengambilan.</h4>
                        </div>
                    @elseif ($mahasiswa->wisuda->berkas->status() == 'pending')
                        <div class="panel-body text-center">
                            <h4 class="">Berkas Dalam Tahap Verifikasi.</h4>
                        </div>
                    @else
                        <div class="panel-body">
                            <br>
                            <div class="text-center">
                                <label>Silahkan Unggah kembali berkas berikut:</label>
                            </div>
                            <br>
                            <form class="form-horizontal form-bordered" enctype="multipart/form-data" method="post"
                                action="{{ route('revisi.berkas', $mahasiswa->wisuda->berkas) }}">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $mahasiswa->wisuda->id }}" name="wisuda_id">
                                <div class="form-group text-center"
                                    {{ $mahasiswa->wisuda->berkas->status_pasfoto == 'revisi' ? '' : 'hidden' }}>
                                    <label class="col-md-3 control-label text-center">
                                        Pas Foto <br>
                                        <span><small class="text-danger"> ( Format JPG )</small></span>
                                    </label>

                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="pasfoto" />
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists"
                                                    data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center"
                                    {{ $mahasiswa->wisuda->berkas->status_scanktp == 'revisi' ? '' : 'hidden' }}>
                                    <label class="col-md-3 control-label text-center">
                                        Scan KTP <br>
                                        <span><small class="text-danger"> ( Format PDF )</small></span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="scanktp" />
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists"
                                                    data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center"
                                    {{ $mahasiswa->wisuda->berkas->status_bebasperpustakaan == 'revisi' ? '' : 'hidden' }}>
                                    <label class="col-md-3 control-label">
                                        Surat Bebas Perpustakaan <br>
                                        <span><small class="text-danger"> ( Format PDF )</small></span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="bebasperpustakaan" />
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists"
                                                    data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center"
                                    {{ $mahasiswa->wisuda->berkas->status_toeflcept == 'revisi' ? '' : 'hidden' }}>
                                    <label class="col-md-3 control-label">
                                        Scan Sertifikat TOEFL/CEPT <br>
                                        <span><small class="text-danger"> ( Format PDF )</small></span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="toeflcept" />
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists"
                                                    data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center"
                                    {{ $mahasiswa->wisuda->berkas->status_buktiskripsi == 'revisi' ? '' : 'hidden' }}>
                                    <label class="col-md-3 control-label">
                                        Scan Bukti Penyerahan Skripsi <br>
                                        <span><small class="text-danger"> ( Format PDF )</small></span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="buktiskripsi" />
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists"
                                                    data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center"
                                    {{ $mahasiswa->wisuda->berkas->status_pengesahanskripsi == 'revisi' ? '' : 'hidden' }}>
                                    <label class="col-md-3 control-label">
                                        Scan Lembar Pengesahan Skripsi <br>
                                        <span><small class="text-danger"> ( Format PDF )</small></span>
                                    </label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="pengesahanskripsi" />
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists"
                                                    data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center"
                                    {{ $mahasiswa->wisuda->berkas->status_pembayaranpendaftaran == 'revisi' ? '' : 'hidden' }}>
                                    <label class="col-md-3 control-label">
                                        Scan Bukti Pembayaran Pendaftaran <br>
                                        <span><small class="text-danger"> ( Format PDF )</small></span>

                                    </label>
                                    <div class="col-md-9">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="input-append">
                                                <div class="uneditable-input">
                                                    <i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-default btn-file">
                                                    <span class="fileupload-exists">Change</span>
                                                    <span class="fileupload-new">Select file</span>
                                                    <input type="file" name="pembayaranpendaftaran" />
                                                </span>
                                                <a href="#" class="btn btn-default fileupload-exists"
                                                    data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                @endif
            @else
                <div class="panel-body text-center">
                    <h4 class="">Anda Belum Melakukan Pendaftaran.</h4>
                    <a href="{{ url('students/register') }}" class="btn btn-primary">silahkan melakukan pendaftaran</a>
                </div>
            @endif
        @else
            <div class="panel-body">
                <h4 class="text-center mb-3">Belum masa unggah berkas atau masa unggah berkas telah berakhir</h4>
            </div>
        @endif

    </section>
@endsection
