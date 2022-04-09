@extends('layouts.app')
@section('content')
    <div class="box-shadow">
        <div class="col-12 shadow shadow-lg">
            <div class="py-3">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Notifikasi</div>
            </div>
        </div>
    </div>
    <div class="bg-grey mt-1" style="max-height: 86vh; overflow: auto">
        <div class="container-omyra" style="margin-bottom: 90px;">
            <div class="d-flex">
                {{-- <div class="mr-19 h-94 w-94 d-inline-block">
                <img src="https://omyraglobal.com/public/uploads/galleries/1643357598jweyy9.jpg" class="rounded-4" width="94" height="94">
            </div> --}}
                <div class="w-251 d-inline-block">
                    <div class="text-pink d-inline-block">(Nama User)</div>
                    <div class="font-weight-500 line-height-23 font-18px d-inline-block">
                        menghapus laporan #424 Briket 25 ton
                    </div>
                    <div class="d-inline-block font-14" style="color: #BBBBBB">13-04-2022 10:00</div>
                </div>
            </div>
            <hr>
            <div class="d-flex">
                {{-- <div class="mr-19 h-94 w-94 d-inline-block">
                <img src="https://omyraglobal.com/public/uploads/galleries/1643874479kawkel.jpg" class="rounded-4" width="94" height="94">
            </div> --}}
                <div class="w-251 d-inline-block">
                    <div class="text-pink d-inline-block">(Nama User)</div>
                    <div class="font-weight-500 line-height-23 font-18px d-inline-block">
                        Menambahkan Data Stok Inner Box
                    </div>
                    <div class="d-inline-block font-14" style="color: #BBBBBB">13-04-2022 10:00</div>
                </div>
            </div>
            <hr>
            <div class="d-flex">
                {{-- <div class="mr-19 h-94 w-94 d-inline-block">
                <img src="https://omyraglobal.com/public/uploads/galleries/1643874479qj69ib.jpg" class="rounded-4" width="94" height="94">
            </div> --}}
                <div class="w-251 d-inline-block">
                    <div class="text-pink d-inline-block">(Nama User)</div>
                    <div class="font-weight-500 line-height-23 font-18px d-inline-block">
                        mengubah data stok inner box 200 dengan ID #324
                    </div>
                    <div class="d-inline-block font-14" style="color: #BBBBBB">13-04-2022 10:00</div>
                </div>
            </div>
        </div>
    </div>
@endsection
