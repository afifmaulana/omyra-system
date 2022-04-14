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
                <a href="{{ route('frontend.master.index') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Form input Master Box</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: hidden;">
        <div class="container-omyra">
            <form action="">
                @csrf
                <div class="form-group">
                    <label class="font-weight-500">Tanggal</label>
                    <input type="text" name="" id="" class="datepicker form-control font-size-16 form-omyra" placeholder="Masukkan Tanggal Master Datang">
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Brand</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="state">
                        <option selected disabled>Pilih Brand</option>
                        {{-- <optgroup label="Test"> --}}
                        <option value="AL">ADP</option>
                        <option value="WY">BABYLON</option>
                        <option value="WY">COCO PRO</option>
                        <option value="WY">FLARE</option>
                        <option value="WY">MOES KOHLE</option>
                        <option value="WY">GOLDEN NUGGET</option>
                        {{-- </optgroup> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Jenis</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="state">
                        <option selected disabled>Pilih Jenis</option>
                        <optgroup label="ADP">
                            <option value="AL">INNER RZA 1KG</option>
                            <option value="WY">MC RZA 1KG</option>
                            <option value="AL">MC RZA GASTRO 1KG</option>
                            <option value="WY">INNER BLACK 1KG</option>
                            <option value="WY">MC BLACK 1KG</option>
                            <option value="WY">MC BLACK GASTRO 1KG</option>
                            <option value="WY">INNER BLUE  1KG</option>
                            <option value="WY">MC BLUE 1KG</option>
                            <option value="WY">MC BLUE 3KG</option>
                            <option value="WY">MC BLUE GASTRO 1KG</option>
                            <option value="WY">INNER LIGHT BLUE YPSILON</option>
                            <option value="WY">MC LIGHT BLUE YPSILON</option>
                            <option value="WY">INNER YELLOW</option>
                            <option value="WY">MC YELLOW</option>
                            <option value="WY">INNER ORANGE</option>
                            <option value="WY">MC ORANGE</option>
                            <option value="WY">INNER GREEN</option>
                            <option value="WY">MC GREEN</option>
                        </optgroup>
                        <optgroup label="BABYLON">
                            <option value="AL">INNER 1KG</option>
                            <option value="WY">MC 20KG</option>
                            <option value="AL">MC CURAH</option>
                            <option value="WY">INNER COCO GOLDEN CLASS</option>
                            <option value="WY">MC COCO GOLDEN CLASS</option>
                        </optgroup>
                        <optgroup label="FLARE">
                            <option value="AL">INNER 2KG</option>
                            <option value="WY">MC 12KG</option>
                            <option value="AL">INNER SMALL 0,375</option>
                            <option value="WY">MC SMALL 9KG</option>
                            <option value="WY">INNER MEDIUM</option>
                            <option value="WY">MC MEDIUM</option>
                            <option value="WY">INNER STARCOCO</option>
                            <option value="WY">MC STARCOCO</option>
                        </optgroup>
                        <optgroup label="COCO PRO">
                            <option value="AL">MASTER COCO PRO</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Ukuran</label>
                    <select class="select2 form-control font-size-16 form-omyra" name="state">
                        <option selected disabled>Pilih Ukuran</option>
                        <optgroup label="ADP">
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
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Jumlah Master</label>
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
