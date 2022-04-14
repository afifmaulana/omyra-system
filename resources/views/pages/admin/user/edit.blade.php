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

                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="form-horizontal form-label-left" novalidate>
                                    @csrf
                                    @method('put')
                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Nama <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="title" class="form-control col-md-7 col-xs-12  @error('name') is-invalid @enderror"
                                                name="name" value="{{ $user->name ?? old('name') }}"
                                                placeholder="Masukkan Nama" required="required" type="text">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Email <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="email" class="form-control col-md-7 col-xs-12 @error('email') is-invalid @enderror"
                                                name="email" value="{{ $user->email ?? old('email') }}"
                                                placeholder="Masukkan Email" required="required" type="text">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Jabatan <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <select id="heard" class="form-control @error('role') is-invalid @enderror" name="role" required="required">
                                                <option value="" selected disabled>---- Pilih Jabatan ----</option>
                                                <option value="0" {{ $user->role == '0' ? 'selected' : '' }}>Admin</option>
                                                <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Mandor</option>
                                                <option value="2" {{ $user->role == '2' ? 'selected' : '' }}>Staff Gudang</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-md-12 col-sm-12 col-xs-12" for="title">Password <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input id="password" class="form-control col-md-7 col-xs-12"
                                                name="password"
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
