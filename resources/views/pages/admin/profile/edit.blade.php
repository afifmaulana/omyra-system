@extends('layouts.admin.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            @include('components.admin.flashmessage')
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Ubah Profil </h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form action="{{ route('admin.profile.update') }}" method="POST"
                                enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="item form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="name">Name <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="name"
                                            class="form-control col-md-7 col-xs-12 {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            name="name" placeholder="Enter Name Here" required="required" type="text"
                                            value="{{ $data->name }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('name') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="name">Email <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="email"
                                            class="form-control col-md-7 col-xs-12 {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            name="email" placeholder="Enter Email Here" required="required" type="text"
                                            value="{{ $data->email }}">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('email') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="title">Jabatan <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <select class="form-control @error('role') is-invalid @enderror" name="role" type="hidden" required="required">
                                            <option value="" selected disabled>---- Pilih Jabatan ----</option>
                                            <option value="0" {{ $data->role == '0' ? 'selected' : '' }}>Admin</option>
                                            
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-md-12 col-sm-12 col-xs-12" for="name"> Password <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="name"
                                            class="form-control col-md-7 col-xs-12 {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                            name="password" placeholder="Enter Password Here" required="required"
                                            type="password">
                                        <div class="text-danger text-sm">
                                            *Note: Masukkan password baru untuk mengubah password atau masukkan password
                                            yang lama jika tidak ingin mengubah password.
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('password') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6">
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
