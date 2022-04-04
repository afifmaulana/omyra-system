@extends('layouts.app')
@section('content')
    <div class="box-shadow">
        <div class="col-12 shadow shadow-lg">
            <div class="py-3">
                <a href="">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Form input Inner Box</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: hidden">
    <div class="container-omyra">
        <form action="">
            @csrf
            <div class="form-group">
                <label class="font-weight-500">Tanggal</label>
                <input type="text" name="" id="" class="datepicker form-control font-size-16 form-omyra">
            </div>
            <div class="form-group">
                <label class="font-weight-500">Inner Name</label>
                <input type="text" name="" id="" class="form-control font-size-16 form-omyra">
            </div>
            <div class="form-group">
                <label class="font-weight-500">Jumlah Inner</label>
                <input type="text" name="" id="" class="form-control font-size-16 form-omyra">
            </div>
            <button class="btn btn-omyra btn-block btn-pink text-white" type="submit">Simpan</button>
        </form>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.datepicker').datepicker({
            autoclose : true,
            format: 'dd/mm/yyyy'
        });
    </script>
@endpush
