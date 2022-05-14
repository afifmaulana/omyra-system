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
                <a href="{{ route('frontend.semi-finished.index') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Form Barang 1/2 Jadi</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: scroll;">
        <div class="container-omyra" style="margin-bottom: 90px;">
            <form action="">
                @csrf
                <div class="form-group">
                    <label class="font-weight-500">Tanggal</label>
                    <input type="text" name="" id="" class="datepicker form-control font-size-16 form-omyra" placeholder="Masukkan Tanggal Borongan">
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Bongkar Oven</label>
                    <input type="text" name="" id="" class="datepicker form-control font-size-16 form-omyra" placeholder="Masukkan Tanggal Bongkar Oven">
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Brand</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="brand_id">
                        <option selected disabled>Pilih Brand</option>
                        {{-- <optgroup label="Test"> --}}
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Jenis</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="brand_type_id">
                        <option selected disabled>Pilih Jenis</option>
                        @foreach ($BrandTypes as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_type }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Ukuran</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="size_id">
                        <option selected disabled>Pilih Ukuran</option>
                        @foreach ($sizes as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_size }}</option>
                        @endforeach
                        {{-- <optgroup label="ADP">
                            <option value="AL">25x25x25</option>
                            <option value="WY">26x26x26</option>
                            <option value="AL">27x27x27</option>
                            <option value="WY">28x28x28</option>
                        </optgroup>
                        <optgroup label="BABYLON">
                            <option value="AL">25x25x25</option>
                            <option value="WY">26x26x26</option>
                            <option value="AL">27x27x27</option>
                            <option value="WY">28x28x28</option>
                        </optgroup>
                        <optgroup label="COCO PRO">
                            <option value="AL">25x25x25</option>
                            <option value="WY">26x26x26</option>
                            <option value="AL">27x27x27</option>
                            <option value="WY">28x28x28</option>
                        </optgroup> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Total Barang</label>
                    <input type="text" name="" id="" class="form-control font-size-16 form-omyra" placeholder="12.000">
                </div>
                <button class="btn btn-omyra btn-block btn-pink text-white" type="submit">Simpan</button>
                <a class="btn btn-outline-secondary btn-block" href="{{ route('frontend.semi-finished.index') }}">Kembali</a>
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
