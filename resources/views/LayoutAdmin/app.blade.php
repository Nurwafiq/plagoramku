<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('gambar/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-style: none;
        }

        #myTable_wrapper .row {
            margin-bottom: 10px;
        }

        .dataTables_length {
            display: flex;
        }

        .dataTables_length label {
            display: flex;
            gap: 10px;
        }

        .dataTables_length label select {
            width: 60px;
        }

        .dataTables_filter label {
            display: flex;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0;
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('LayoutAdmin.sidebar')
        <!--  Main wrapper -->
        @include('sweetalert::alert')
        <div class="body-wrapper">
            @include('LayoutAdmin.header')
            @yield('isicontent')
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>


    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>
