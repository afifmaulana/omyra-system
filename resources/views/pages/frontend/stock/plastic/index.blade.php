@extends('layouts.frontend.app')
@section('content')
    <div class="box-shadow">
        <div class="col-12 shadow shadow-lg">
            <div class="py-3">
                <a href="{{ route('frontend.stock.index') }}">
                    <img src="{{ asset('images/icon/back.png') }}" width="18" height="18">
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="text-header font-size-18 text-active-pink font-weight-500">Data Stok Plastik</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: auto">
        <div class="container-omyra" style="margin-bottom: 90px;">
            <div class="float-right">
                <a href="{{ route('frontend.plastic.create') }}" class="btn btn-sm btn-primary"
                    style="border-radius: 30px"> <i class="fa fa-plus"></i> Tambah</a>
            </div>
            <h5 class="py-3"></h5>

            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Merk Inner</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>
                            <a href="">
                                <button class="btn-sm btn-outline-warning"><i class="fa fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>
                            <a href="">
                                <button class="btn-sm btn-outline-warning"><i class="fa fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>
                            <a href="">
                                <button class="btn-sm btn-outline-warning"><i class="fa fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>
                            <a href="">
                                <button class="btn-sm btn-outline-warning"><i class="fa fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>
                            <a href="">
                                <button class="btn-sm btn-outline-warning"><i class="fa fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>
                            <a href="">
                                <button class="btn-sm btn-outline-warning"><i class="fa fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
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
