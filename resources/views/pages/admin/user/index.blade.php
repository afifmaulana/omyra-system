    @extends('layouts.admin.app')
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets-admin/assets/dataTable/css/select.dataTables.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-admin/assets/dataTable/css/responsive.dataTables.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-admin/assets/dataTable/css/datatables.css') }}">

    @endpush
    @section('content')
        <!-- page content -->
        <div class="right_col" role="main">

            <div class="">
                <div class="page-title">
                    {{-- <div class="title_left">
                        <h3>Data Pengguna</h3>
                    </div> --}}
                    @include('components.admin.flashmessage')
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Pengguna</h2>
                                    <div class="nav navbar-right panel_toolbox">
                                        <div class="d-flex float-end">
                                            <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-primary"
                                                style="border-radius: 30px"> <i class="fa fa-plus"></i> Tambah Baru</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p class="text-muted font-13 m-b-30">
                                        Anda dapat menambahkan pengguna aplikasi di sini
                                    </p>
                                    <table id="dataTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th style="width: 20px">No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
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
                                <button id="deleteButton" type="submit" href=""
                                    class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

        @push('scripts')
        <script src="{{ asset('assets-admin/assets/dataTable/js/datatables.js') }}"></script>
        <script src="{{ asset('assets-admin/assets/dataTable/js/dataTables.responsive.min.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
                // Jquery Datatable
                // let jquery_datatable = $("#datatable").DataTable()
                if ($('#dataTable').length) {
                    let url = "{{ route('admin.user.datatables') }}";
                    let rowData = [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'role',
                            name: 'role'
                        },
                        // { data: 'deleted', name: 'deleted' },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            sortable: false
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
                                d.id = $('input[name=user_id]').val()
                                d.name = $('input[name=name]').val()
                                d.email = $('input[name=email]').val()
                                d.role = $('input[name=role]').val()
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
                                url: "{{ route('admin.user.delete', '') }}" + "/" + id,
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
