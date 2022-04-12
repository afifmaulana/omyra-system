@extends('layouts.admin.app')
@section('content')
    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    {{-- <div class="title_left">
                        <h3>Tambah Pengguna</h3>
                    </div> --}}

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tambah Pengguna Baru <small>Anda dapat manambahkan pengguna aplikasi di sini</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form action="#" method="POST" class="form-horizontal form-label-left" novalidate>
                                    @csrf

                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Nama <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="title" class="form-control col-md-7 col-xs-12"
                                                name="title"
                                                placeholder="Masukkan Nama" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Email <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="email" class="form-control col-md-7 col-xs-12"
                                                name="email"
                                                placeholder="Masukkan Email" required="required" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Jabatan <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <select id="heard" class="form-control" name="page_name" required="required">
                                                <option value="" selected disabled>---- Pilih Jabatan ----</option>
                                                <option value="Mandor">Mandor</option>
                                                <option value="Gudang">Gudang</option>
                                                <option value="Admin">Admin</option>
                                                <option value="CEO">CEO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Password <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="password" class="form-control col-md-7 col-xs-12"
                                                name="Password"
                                                placeholder="Masukkan Password" required="required" type="password">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-primary">Cancel</a>
                                            <button id="send" type="submit" class="btn btn-sm btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- /page content -->
@endsection
