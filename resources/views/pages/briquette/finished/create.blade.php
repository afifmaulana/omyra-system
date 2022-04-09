@extends('layouts.app')
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
                <a href="{{ url('/stok') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Form Barang Jadi</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: hidden">
        <div class="container-omyra" style="margin-bottom: 90px;">
            <form action="">
                @csrf
                <div class="form-group">
                    <label class="font-weight-500">Tanggal</label>
                    <input type="text" name="" id="" class="datepicker form-control font-size-16 form-omyra" placeholder="Masukkan Tanggal Bongkar Oven">
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Brand</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="state">
                        <option selected disabled>Pilih Brand</option>
                        <optgroup label="Test">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Test">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Jenis</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="state">
                        <option selected disabled>Pilih Jenis</option>
                        <optgroup label="Test">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Test">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Berat</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="state">
                        <option selected disabled>Pilih Berat</option>
                        <option value="AL">12Kg</option>
                        <option value="WY">20Kg</option>
                        <option value="AL">25Kg</option>
                        <option value="WY">30Kg</option>
                    </select>
                </div>
                <button class="btn btn-omyra btn-block btn-pink text-white" type="submit">Simpan</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
    </script>
@endpush
