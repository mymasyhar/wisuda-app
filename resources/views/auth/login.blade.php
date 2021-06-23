@include('layouts.head')
@include('layouts.header')
@include('sweetalert::alert')

{{-- <section class="body-sign">
    <div class="center-sign">
        <div class="panel panel-sign">
            <div class="panel-body">
                <form action="{{ route('login') }}" method="post">

                    {{ csrf_field() }}
                    <div class="form-group mb-lg">
                        <label>Username</label>
                        <div class="input-group input-group-icon">
                            <input name="kode" type="text" class="form-control input-lg" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control input-lg" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-primary" type="submit">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a
                href="https://colorlib.com">Colorlib</a>.</p>
    </div>
</section> --}}
<section class="panel" style="height: 100vh-60px">
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('style/octopus/assets/images/login-bg.jpeg') }}" alt="left"
                style="object-fit: cover; max-height:600px; width: 860px;">
        </div>
        <div class="col-md-4">
            <div class="panel-body" style="height: 600px;">
                <div class="row text-center" style="margin-top: 30px">
                    <h3>Sistem Informasi Pendaftaran Wisuda Sarjana, Magister, dan Doktor</h3>
                </div>
                <hr>
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-lg">
                        <label>Username</label>
                        <div class="input-group input-group-icon">
                            <input name="kode" type="text" class="form-control input-lg" dusk="kode" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <label>Password</label>
                        <div class="input-group input-group-icon">
                            <input name="password" type="password" class="form-control input-lg" dusk="password" />
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" type="submit" dusk="submit">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
