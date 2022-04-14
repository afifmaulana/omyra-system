<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('assets-admin/build/images/back_disabled.png') }}" rel="icon">

    <title>Login Admin Omyra Global Resources | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets-admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets-admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets-admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('assets-admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets-admin/build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login" style="background-image: url('{{ asset('assets-admin/build/images/bg.png') }}">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form id="form-login" action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <h1 style="color: white;">Login Form</h1>
                        <div>
                            <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                placeholder="Email" name="email" required="" value="{{ old('email') }}" />
                        </div>
                        <div>
                            <input type="password"
                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Password" name="password" required="" />
                        </div>

                        <div>
                            <button class="btn btn-default submit" type="submit">Log in</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                {{-- <h1 style="color: white;">
                                    CV. Omyra Global Resource
                                </h1> --}}
                                <p style="color: white;">Copyright 2022 CV Omyra Global Resources</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
