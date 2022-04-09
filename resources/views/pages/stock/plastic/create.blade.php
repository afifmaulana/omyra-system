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
                <a href="{{ url('/stok/inner') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Form input Data Plastik</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: hidden; margin-bottom: 30px">
        <div class="container-omyra">
            <form action="">
                @csrf
                <div class="form-group">
                    <label class="font-weight-500">Tanggal</label>
                    <input type="text" name="" id="" class="datepicker form-control font-size-16 form-omyra" placeholder="Masukkan Tanggal Inner Datang">
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
                    <label class="font-weight-500">Ukuran</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="state">
                        <option selected disabled>Pilih Ukuran</option>
                        <option value="AL">25x25x25</option>
                        <option value="WY">26x26x26</option>
                        <option value="AL">27x27x27</option>
                        <option value="WY">28x28x28</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Jumlah Plastik</label>
                    <input type="text" name="" id="" class="form-control font-size-16 form-omyra" placeholder="12.000">
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
