@extends('layouts.frontend.app')
@section('content')
    <div class="box-shadow">
        <div class="col-12 shadow shadow-lg">
            <div class="py-3">
                <a href="{{ route('frontend.dashboard.index') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Stok</div>
            </div>
        </div>
    </div>
    <div class="mt-1" style="max-height: 86vh; overflow: scroll;">
        <div class="container-omyra" style="margin-bottom: 90px;">
            <div class="row mb-2 px-2">
                <div class="col-4">
                    <div class="rounded bg-green mb-1px">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('frontend.inner.index') }}">
                                    <i class="fas fa-archive fa-2x text-white"></i>
                                </a>
                            </div>
                            {{-- <div class="font-weight-bold text-white text-center">711.000</div> --}}
                        </div>
                    </div>
                    <p class="text-center font-xs lh-15">Inner Box</p>
                </div>
                <div class="col-4">
                    <div class="rounded bg-blue mb-1px">
                        <div class="card-body ">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('frontend.master.index') }}">
                                    <i class="fas fa-cube fa-2x text-white"></i>
                                </a>
                            </div>
                            {{-- <div class="font-weight-bold text-white text-center">511.000</div> --}}
                        </div>
                    </div>
                    <p class="text-center font-xs lh-15">Master Carton</p>
                </div>
                <div class="col-4">
                    <div class="rounded bg-red mb-1px">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('frontend.plastic.index') }}">
                                    <i class="fas fa-cubes fa-2x text-white"></i>
                                </a>
                            </div>
                            {{-- <div class="font-weight-bold text-white text-center">51.000 Kg</div> --}}
                            {{-- <img src="{{ asset('images/icon/catatan.png') }}" width="30" height="30"> --}}
                            {{-- <i class="fas fa-list-ul fa-2x text-white"></i> --}}
                        </div>
                    </div>
                    <p class="text-center font-xs lh-15">Plastik</p>
                </div>
            </div>
        </div>
    </div>
@endsection
