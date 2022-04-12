<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('assets-admin/build/images/back_enabled.png') }}" rel="icon">
    <title>Admin Omyra Global Resources</title>
    <!-- Bootstrap -->
    <link href="{{ asset('assets-admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets-admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets-admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets-admin/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets-admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets-admin/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets-admin/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets-admin/build/css/custom.min.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{ asset('assets-admin/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">

    <!-- Switchery -->
    <link href="{{ asset('assets-admin/vendors/switchery/dist/switchery.min.css') }}" rel="stylesheet">

    <!-- Datatables -->
    <link href="{{ asset('assets-admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendors/summernote/summernote-lite.min.css') }}" rel="stylesheet">

    <style>
        table.dataTable td{
            padding: 15px 8px;
        }
        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
        .dropdown-menu{
            min-width: .8em;
        }
        .sidebar-wrapper {
            background: #081c3e;
        }
        .sidebar-wrapper .menu .sidebar-title {
            color: #b6b6b6
        }
        .text-grey {
            color: #dadada
        }
        .sidebar-wrapper .menu .submenu .submenu-item a {
            color: #b6b6b6
        }
        .sidebar-item:hover {
            background-color: #081c3e;
            color: #b6b6b6
        }
    </style>

	@stack('styles')
</head>
