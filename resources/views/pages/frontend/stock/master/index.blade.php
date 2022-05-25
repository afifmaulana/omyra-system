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
                <div class="text-header font-size-18 text-active-pink font-weight-500">Data Stok Master Box</div>
            </div>
        </div>
    </div>
    <div class="bg-grey pt-23 mt-1" style="max-height: 86vh; overflow: scroll;">
        <div class="container-omyra" style="margin-bottom: 90px;">
            @include('components.frontend.flashmessage')
            <div class="float-right">
                <a href="{{ route('frontend.master.create') }}" class="btn btn-sm btn-primary" style="border-radius: 30px">
                    <i class="fa fa-plus"></i> Tambah</a>
            </div>
            <h5 class="py-3"></h5>

            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Brand</th>
                        <th>Jenis</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Brand</th>
                        <th>Jenis</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        if ($('#dataTable').length) {
            let url = "{{ route('frontend.master.datatables') }}";
            let rowData = [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'brand_id',
                    name: 'brand_id'
                },
                {
                    data: 'brand_type_id',
                    name: 'brand_type_id'
                },
                {
                    data: 'brand_size_id',
                    name: 'brand_size_id'
                },
                {
                    data: 'stock_total',
                    name: 'stock_total'
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
                        d.id = $('input[name=stock_id]').val()
                        d.date = $('input[name=date]').val()
                        d.brand_id = $('input[name=brand_id]').val()
                        d.brand_type_id = $('input[name=brand_type_id]').val()
                        d.brand_size_id = $('input[name=brand_size_id]').val()
                        d.stock_total = $('input[name=stock_total]').val()
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
                        type: 'get',
                        url: "{{ url('/stock/master/delete') }}" + "/" + id,
                        data: {
                            // "_token": "{{ csrf_token() }}"
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        beforeSend: function() {

                        },
                        success: function(res) {
                            console.log(res)
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
    </script>
@endpush
