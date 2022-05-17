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
                <a href="{{ route('frontend.plastic.index') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Form input Data Plastik</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: scroll; margin-bottom: 30px">
        <div class="container-omyra">
            <form action="{{ route('frontend.plastic.store') }}" method="POST">
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
                        {{-- <optgroup label="Test"> --}}
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                        @endforeach
                        @if ($errors->has('brand_id'))
                            <span class="invalid-feedback" role="alert">
                                <p><b>{{ $errors->first('brand_id') }}</b></p>
                            </span>
                        @endif
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
                <a class="btn btn-outline-secondary btn-block" href="{{ route('frontend.master.index') }}">Kembali</a>
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

        $(document).on('change', '#input-brand-id', function(e) {
            e.preventDefault()
            const id = $(this).val()
            const url = `{{ url('/api/brand/type/get') }}`
            $.ajax({
                url: url,
                type: "post",
                data: {
                    brand_id: id,
                    box_type: 'PLASTIC'
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
