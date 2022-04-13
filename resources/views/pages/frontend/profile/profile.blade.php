@extends('layouts.frontend.app')
@section('content')
    <div class="container box-shadow">
        <div class="py-3">
            <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
        </div>
        <div class="row justify-content-center">
            <div class="text-header font-size-18 text-active-pink font-weight-500">Edit Profil</div>
        </div>
    </div>
    <div class="pb-3 bg-grey mt-1" style="max-height: 86vh; overflow: auto">
        <div class="container-omyra pt-2">
            <form action="">
                @csrf
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="" id="" class="form-control font-size-16 form-omyra" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="" id="" class="form-control font-size-16 form-omyra" placeholder="*******">
                </div>
                <div class="form-group">
                    <label for="">No HP</label>
                    <input type="text" name="" id="" class="form-control font-size-16 form-omyra" placeholder="08123456789">
                </div>
                <div class="form-group">
                    <label for="">Jabatan</label>
                    <input type="text" name="" id="" class="form-control font-size-16 form-omyra" placeholder="Mandor Borongan">
                </div>
                <button class="btn btn-block btn-omyra btn-pink text-white mt-3" type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>

@endsection
