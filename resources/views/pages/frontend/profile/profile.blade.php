@extends('layouts.frontend.app')
@push('styles')
    <style>
        .select2-container .select2-selection--single {
            height: 42px;
            border: solid 1px #b4d5ff;
        }

    </style>
@endpush
@section('content')
    <div class="box-shadow">
        <div class="col-12 shadow shadow-lg">
            <div class="py-3">
                <a href="{{ route('frontend.dashboard.index') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Ubah Akun</div>
            </div>
        </div>
    </div>
    <div class="pb-3 bg-grey mt-1" style="max-height: 86vh; overflow: scroll;">
        <div class="container-omyra pt-2">
            @include('components.frontend.flashmessage')
            <form action="{{ route('frontend.profile.update') }}" method="POST">
                @csrf
                {{ method_field('put') }}
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" id=""
                        class="form-control font-size-16 form-omyra {{ $errors->has('name') ? 'is-invalid' : '' }}"
                        value="{{ $user->name }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <p><b>{{ $errors->first('name') }}</b></p>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control font-size-16 form-omyra"
                        placeholder="*******">
                </div>
                <div class="form-group">
                    <label for="">email</label>
                    <input type="email" name="email" id=""
                    class="form-control font-size-16 form-omyra {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        value="{{ $user->email }}">
                    {{-- <input type="hidden" name="email" id="" disabled
                    class="form-control font-size-16 form-omyra {{ $errors->has('email') ? 'is-invalid' : '' }}"> --}}
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <p><b>{{ $errors->first('email') }}</b></p>
                        </span>
                    @endif
                </div>
                @if (Auth::user()->role == '1')
                <div class="form-group">
                    <label class="font-weight-500">Jabatan</label>
                    <select
                        class="select2 form-control font-size-16 form-omyra {{ $errors->has('role') ? 'is-invalid' : '' }}"
                        name="role">
                        <option value="" selected disabled>---- Pilih Jabatan ----</option>
                        <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Mandor</option>
                        @if ($errors->has('role'))
                            <span class="invalid-feedback" role="alert">
                                <p><b>{{ $errors->first('role') }}</b></p>
                            </span>
                        @endif
                    </select>
                </div>
                @endif
                @if (Auth::user()->role == '2')
                <div class="form-group">
                    <label class="font-weight-500">Jabatan</label>
                    <select
                        class="select2 form-control font-size-16 form-omyra {{ $errors->has('role') ? 'is-invalid' : '' }}"
                        name="role">
                        <option value="" selected disabled>---- Pilih Jabatan ----</option>
                        <option value="1" {{ $user->role == '2' ? 'selected' : '' }}>Staff Gudang</option>
                        @if ($errors->has('role'))
                            <span class="invalid-feedback" role="alert">
                                <p><b>{{ $errors->first('role') }}</b></p>
                            </span>
                        @endif
                    </select>
                </div>
                @endif
                <button class="btn btn-block btn-omyra btn-pink text-white mt-3" type="submit">Simpan Perubahan</button>
                <a class="btn btn-outline-secondary btn-block" href="{{ route('logout') }}">Keluar</a>
            </form>
        </div>
    </div>
@endsection
