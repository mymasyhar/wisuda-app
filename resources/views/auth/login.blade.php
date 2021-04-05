@include('layouts.head')
@include('layouts.header')

<section class="body-sign">
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
                        <div class="clearfix">
                            <label class="pull-left">Password</label>
                            <a href="pages-recover-password.html" class="pull-right">Lost Password?</a>
                        </div>
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
                            {{-- <a href class="btn btn-primary mt-lg">Sign
                                In</a> --}}
                            <button class="btn btn-primary" type="submit">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a
                href="https://colorlib.com">Colorlib</a>.</p>
    </div>
</section>

@include('layouts.footer')
