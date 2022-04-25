@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" />

@endpush
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">

        <div class="">
            <div class="page-title">
                @include('components.admin.flashmessage')
                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Data Brand</h2>
                                <div class="nav navbar-right panel_toolbox">
                                    <div class="d-flex float-end">
                                        <a href="{{ route('admin.brand.create') }}" class="btn btn-sm btn-primary"
                                            style="border-radius: 30px"> <i class="fa fa-plus"></i> Tambah Baru</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <p class="text-muted font-13 m-b-30">
                                    Anda dapat menambahkan nama Brand di sini
                                </p>
                                <table id="dataTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th style="width: 20px">No</th>
                                            <th>Nama Brand</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /page content -->
    @endsection

    @push('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            // Jquery Datatable
            // let jquery_datatable = $("#datatable").DataTable()
            if ($('#dataTable').length) {
                let url = "{{ route('admin.brand.datatables') }}";
                let rowData = [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'brand_name',
                        name: 'brand_name'
                    },
                    // { data: 'deleted', name: 'deleted' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        sortable: true
                    },
                ];
                table = $("#dataTable").DataTable({
                    dom: 'Brtp',
                    paging: true,
                    responsive: false,
                    autoWidth: false,
                    bPaginate: true,
                    processing: true,
                    serverSide: true,
                    order: [0, 'desc'],
                    oLanguage: {
                        oPaginate: {
                            sNext: '<span class="pagination-fa"><i class="fa fa-chevron-right" ></i></span>',
                            sPrevious: '<span class="pagination-fa"><i class="fa fa-chevron-left" ></i></span>'
                        }
                    },
                    ajax: {
                        url: url,
                        type: "POST",
                        data: function(d) {
                            d._token = "{{ csrf_token() }}"
                            d.id = $('input[name=brand_id]').val()
                            d.brand_name = $('input[name=brand_name]').val()
                        }
                    },
                    columns: rowData
                });
            }
            $(document).on('click', '.btn-delete', function(e) {
                e.preventDefault()
                const id = $(this).data('id')
                Swal.fire({
                    text: 'Are you sure you want to delete this data?',
                    showCancelButton: true,
                    confirmButtonText: `Delete`,
                    cancelButtonText: `No`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'delete',
                            url: "{{ route('admin.brand.delete', '') }}" + "/" + id,
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            beforeSend: function() {

                            },
                            success: function(res) {
                                if (res.status) {
                                    Swal.fire('Deleted!', '', 'success')
                                    table.ajax.reload()
                                }
                            }
                        })

                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                })

            })
            $('.input-filter').on('keyup change', function() {
                table.draw();
            })
        </script>
    @endpush
