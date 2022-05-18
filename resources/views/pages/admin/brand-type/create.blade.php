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

                            <form action="{{ route('admin.brand-type.store') }}" method="POST"
                                class="form-horizontal form-label-left" novalidate>
                                @csrf

                                <div class="item form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="BrandName">Jenis Brand<span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="brand_type"
                                            class="form-control col-md-7 col-xs-12 {{ $errors->has('brand_type') ? 'is-invalid' : '' }}"
                                            name="brand_type" value="{{ old('brand_type') }}"
                                            placeholder="Masukkan Jenis Brand" required="required" type="text">
                                        @error('brand_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="Brand">Brand<span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control {{ $errors->has('brand_id') ? 'is-invalid' : '' }}"
                                            name="brand_id" type="hidden" required="required">
                                            <option value="" selected disabled>---- Pilih Brand ----</option>
                                            @foreach ($brand as $item)
                                                <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                                            @endforeach
                                            @if ($errors->has('brand_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <p><b>{{ $errors->first('brand_id') }}</b></p>
                                                </span>
                                            @endif

                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="Brand">Jenis Box<span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control {{ $errors->has('box_type') ? 'is-invalid' : '' }}"
                                            name="box_type" type="hidden" required="required">
                                            <option value="" selected disabled>---- Pilih Jenis Box ----</option>
                                            <option value="INNER">INNER</option>
                                            <option value="MASTER">MASTER</option>
                                            <option value="PLASTIC">PLASTIC</option>
                                        </select>
                                        @if ($errors->has('box_type'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('box_type') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ route('admin.brand-type.index') }}"
                                            class="btn btn-sm btn-primary">Kembali</a>
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
