@extends('layouts.admin.app')
@section('content')
    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">

                </div>
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tambah Brand Baru<small>Anda dapat manambahkan Brand baru di sini</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form action="#" method="POST" class="form-horizontal form-label-left" novalidate>
                                    @csrf

                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Nama Brand<span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="title" class="form-control col-md-7 col-xs-12"
                                                name="title"
                                                placeholder="Masukkan Nama" required="required" type="text">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a href="#" class="btn btn-sm btn-primary">Cancel</a>
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
