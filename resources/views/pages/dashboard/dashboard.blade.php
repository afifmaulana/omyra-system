@extends('layouts.app')
@section('content')
    <div class="home-card mb-37">
        <div class="buble buble1"></div>
        <div class="buble buble2"></div>
        <div class="container-omyra" style="position: relative">
            <div class="row justify-content-between pt-3 mb-41">
                <div class="row">
                    <div class="ml-25 mr-5px">
                        <img src="{{ asset('images/logo.png') }}" alt="m-health" width="100px" height="31px">
                    </div>
                </div>
                <div class="mr-15">
                    <img src="{{ asset('images/icon/notification.png') }}" width="25" height="25">
                    {{-- <i class="fas fa-bell fa-lg text-white"></i> --}}
                </div>
            </div>
            <div class="text-white mb-34" style="position: relative;">
                <div>Halo ibu,</div>
                <h4 class="d-block font-weight-bold">Sumi Sumiyati</h4>
            </div>


            <div class="card card-home">
                <div class="card-body shadow text-center" style="height: 150px">
                    <h6>Total Stok Barang</h6>
                    <div class="row justify-content-center mb-2">
                        <div class="col-auto">
                            <div class="text-red px-2 font-40px font-weight-bold border border-danger">51 Ton</div>
                        </div>
                    </div>
                    <p class="text-red text-card-top d-sm-inline-block">Jumlah stok otomatis akan berkurang setelah Anda selesai laporan jumlah Stuffing
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-omyra pb-5" style="max-height: 86vh; overflow: auto">
        <div class="d-flex justify-content-between mb-2">
            <div class="w-76 h-114">
                <div class="box-home rounded bg-green mb-1px">
                    <div class="card-body ">
                        <img src="{{ asset('images/icon/diary.png') }}" width="30" height="30">
                    </div>
                </div>
                <p class="text-center font-xs lh-15">Stock Briket</p>
            </div>
            <div class="w-76 h-114">
                <div class="box-home rounded bg-blue mb-1px">
                    <div class="card-body ">
                        <a href="{{ url('/stok') }}">
                            <img src="{{ asset('images/icon/pemeriksaan.png') }}" width="30" height="30">
                        </a>
                    </div>
                </div>
                <p class="text-center font-xs lh-15">Stok Inner & Master Box</p>
            </div>
            <div class="w-76 h-114">
                <div class="box-home rounded bg-red mb-1px">
                    <div class="card-body ">
                        <img src="{{ asset('images/icon/catatan.png') }}" width="30" height="30">
                        {{-- <i class="fas fa-list-ul fa-2x text-white"></i>  --}}
                    </div>
                </div>
                <p class="text-center font-xs lh-15">Stuffing</p>
            </div>
            <div class="w-76 h-114">
                <div class="box-home rounded bg-yellow mb-1px">
                    <div class="card-body ">
                        <img src="{{ asset('images/icon/catatan.png') }}" width="30" height="30">
                        {{-- <i class="fas fa-user-md fa-2x text-white"></i>  --}}
                    </div>
                </div>
                <p class="text-center font-xs lh-15">Laporan</p>
            </div>
        </div>

        <h4 class="font-weight-bold font-20 mt-4">Aktivitas Anda</h4>

        <hr>
        <div class="d-flex">
            <div class="mr-19 h-94 w-94 d-inline-block">
                <img src="https://omyraglobal.com/public/uploads/galleries/1643357598jweyy9.jpg" class="rounded-4" width="94" height="94">
            </div>
            <div class="w-251 d-inline-block">
                <div class="text-pink d-inline-block">Delete Data</div>
                <div class="font-weight-500 line-height-23 font-18px d-inline-block">
                    Anda menghapus laporan #424 Briket 25 ton
                </div>
                <div class="d-inline-block font-14" style="color: #BBBBBB">11 Jam yang lalu</div>
            </div>
        </div>
        <hr>
        <div class="d-flex">
            <div class="mr-19 h-94 w-94 d-inline-block">
                <img src="https://omyraglobal.com/public/uploads/galleries/1643874479kawkel.jpg" class="rounded-4" width="94" height="94">
            </div>
            <div class="w-251 d-inline-block">
                <div class="text-pink d-inline-block">Tambah Data</div>
                <div class="font-weight-500 line-height-23 font-18px d-inline-block">
                    Anda Menambahkan Data Stok Inner Box
                </div>
                <div class="d-inline-block font-14" style="color: #BBBBBB">11 Jam yang lalu</div>
            </div>
        </div>
        <hr>
        <div class="d-flex">
            <div class="mr-19 h-94 w-94 d-inline-block">
                <img src="https://omyraglobal.com/public/uploads/galleries/1643874479qj69ib.jpg" class="rounded-4" width="94" height="94">
            </div>
            <div class="w-251 d-inline-block">
                <div class="text-pink d-inline-block">Mengubah Data</div>
                <div class="font-weight-500 line-height-23 font-18px d-inline-block">
                    Anda mengubah data stok inner box 200 dengan ID #324
                </div>
                <div class="d-inline-block font-14" style="color: #BBBBBB">11 Jam yang lalu</div>
            </div>
        </div>

    </div>
@endsection
