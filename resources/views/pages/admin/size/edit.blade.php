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
                                <h2>Tambah Ukuran Baru<small>Anda dapat manambahkan Ukuran baru di sini</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form action="{{ route('admin.size.update',$size->id) }}" method="POST" class="form-horizontal form-label-left" novalidate>
                                    @csrf
                                    @method('put')
                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="BrandName">Ukuran Brand<span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="brand_size" class="form-control col-md-7 col-xs-12 @error('brand_size') is-invalid @enderror"
                                                name="brand_size" value="{{ $size->brand_size ?? old('brand_size') }}"
                                                placeholder="Masukkan Ukuran Brand" required="required" type="text">
                                                @error('brand_size')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a href="{{ route('admin.size.index') }}" class="btn btn-sm btn-primary">Kembali</a>
                                            <button id="send" type="submit" class="btn btn-sm btn-success">Simpan</button>
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
