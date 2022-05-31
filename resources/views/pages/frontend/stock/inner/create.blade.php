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
                <a href="{{ route('frontend.inner.index') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Form input Inner Box</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: scroll; margin-bottom: 30px">
        <div class="container-omyra" style="margin-bottom: 90px;">
            <form action="{{ route('frontend.inner.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-weight-500">Tanggal</label>
                    <input type="text" name="date" id=""
                        class="datepicker form-control font-size-16 form-omyra {{ $errors->has('date') ? 'is-invalid' : '' }}"
                        placeholder="Masukkan Tanggal Inner Datang">
                    @if ($errors->has('date'))
                        <span class="invalid-feedback" role="alert">
                            <p><b>{{ $errors->first('date') }}</b></p>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Brand</label>
                    <select id="input-brand-id"
                    class="select2 form-control font-size-16 form-omyra {{ $errors->has('brand_id') ? 'is-invalid' : '' }}" name="brand_id">
                        <option selected disabled>Pilih Brand</option>
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                        @endforeach
                        @if ($errors->has('brand_id'))
                            <span class="invalid-feedback" role="alert">
                                <p><b>{{ $errors->first('brand_id') }}</b></p>
                            </span>
                        @endif

                        {{-- <option value="WY">BABYLON</option>
                        <option value="WY">COCO PRO</option>
                        <option value="WY">FLARE</option>
                        <option value="WY">MOES KOHLE</option>
                        <option value="WY">GOLDEN NUGGET</option> --}}
                        {{-- </optgroup> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Jenis</label>
                    <select id="input-brand-type-id"
                    class="select2 form-control font-size-16 form-omyra {{ $errors->has('brand_type_id') ? 'is-invalid' : '' }}"
                        name="brand_type_id">
                        {{-- <option selected disabled>Pilih Jenis</option>
                        @foreach ($BrandTypes as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_type }}</option>
                        @endforeach --}}
                        {{-- <optgroup label="ADP">
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
                        </optgroup> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-500">Ukuran</label>
                    <select class="select2 form-control font-size-16 form-omyra {{ $errors->has('brand_size_id') ? 'is-invalid' : '' }}"
                         name="brand_size_id">
                        <option selected disabled>Pilih Ukuran</option>
                        @foreach ($sizes as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_size }}</option>
                        @endforeach
                        @if ($errors->has('brand_size_id'))
                            <span class="invalid-feedback" role="alert">
                                <p><b>{{ $errors->first('brand_size_id') }}</b></p>
                            </span>
                        @endif
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
                    <label class="font-weight-500">Jumlah Inner</label>
                    <input type="text" name="stock_total" id=""
                    class="form-control font-size-16 form-omyra {{ $errors->has('stock_total') ? 'is-invalid' : '' }}"
                        placeholder="12.000">
                    @if ($errors->has('stock_total'))
                        <span class="invalid-feedback" role="alert">
                            <p><b>{{ $errors->first('stock_total') }}</b></p>
                        </span>
                    @endif
                </div>
                <button class="btn btn-omyra btn-block btn-pink text-white" type="submit">Simpan</button>
                <a class="btn btn-outline-secondary btn-block" href="{{ route('frontend.inner.index') }}">Kembali</a>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });


        $(document).on('change', '#input-brand-id', function(e) {
            e.preventDefault()
            const id = $(this).val()
            const url = `{{ url('/api/brand/type/get') }}`
            $.ajax({
                url: url,
                type: "post",
                data: {
                    brand_id: id,
                    box_type: 'INNER'
                },
                success: function(res) {
                    let opt = `<option selected disabled>Pilih Jenis</option>`
                    res.data.forEach(item => {
                        opt += `<option value=${item.id}>${item.brand_type}</option>`
                    })
                    $('#input-brand-type-id').html(opt)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
            //
        })
    </script>
@endpush
