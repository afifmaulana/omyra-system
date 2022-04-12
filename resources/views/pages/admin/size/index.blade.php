@extends('layouts.admin.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">

        <div class="">
            <div class="page-title">

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data Ukuran Brand</h2>
                                <div class="nav navbar-right panel_toolbox">
                                    <div class="d-flex float-end">
                                        <a href="#" class="btn btn-sm btn-primary"
                                            style="border-radius: 30px"> <i class="fa fa-plus"></i> Tambah Baru</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                    Anda dapat menambahkan Ukuran Brand di sini
                                </p>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 20px">No</th>
                                            <th>Nama Brand</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($datas as $data) --}}
                                            <tr>
                                                <td>1</td>
                                                <td>Babylon</td>
                                                <td>
                                                    <a href="#"
                                                        class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger modal-delete"
                                                        data-id= data-toggle="modal"
                                                        data-target="#deleteModal">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        {{-- @endforeach --}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /page content -->

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-center">
                            <i style="color: #ffbc05" class="fa fa-question-circle fa-4x"></i>
                        </div>
                        <h5 class="text-center p-4">Apakah Anda yakin ingin menghapus data ini?</h5>
                    </div>
                    <div class="modal-footer">
                        <form id="formDelete" action="" method="post">
                            @csrf
                            @method('delete')
                            <button id="deleteButton" type="submit" href="" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            // Jquery Datatable
            let jquery_datatable = $("#datatable").DataTable()
        </script>
    @endpush
