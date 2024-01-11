<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>HRIS-ALMAS</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('assets/images/almaz.ico')}}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('assets/css/common.min.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <!-- You can choose a theme from css/styles instead of get all themes -->
    <link href="{{asset('assets/css/styles/all-themes.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/bundles/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/form.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/js/bundles/multiselect/css/multi-select.css')}}" rel="stylesheet">
    <style>
        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            border: 0px !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-top: 0px !important;
            border-right: 0px !important;
            border-left: 0px !important;
            border-radius: 0px !important;
        }

        .select2-container--default .select2-selection--multiple {
            border-top: 0px !important;
            border-right: 0px !important;
            border-left: 0px !important;
            border-radius: 0px !important;
        }
    </style>
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="{{asset('assets/images/almaz.png')}}" alt="admin">
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    @include('partials.header')
    <!-- #Top Bar -->
    @include('partials.sidebar')

    @yield('konten')
    <script src="{{asset('assets/js/common.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/js/admin.js')}}"></script>
    @if (request()->is('dashboard'))
    <script src="{{asset('assets/js/bundles/echart/echarts.js')}}"></script>
    <script src="{{asset('assets/js/bundles/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/index.js')}}"></script>
    @endif
    <script src="{{asset('assets/js/pages/todo/todo.js')}}"></script>
    <script src="{{asset('assets/js/table.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
    <!-- form wizard -->
    <script src="{{asset('assets/js/bundles/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/bundles/jquery-steps/jquery.steps.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/form-wizard.js')}}"></script>
    <!-- select2 -->
    <script src="{{asset('assets/js/bundles/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('select.select2:not(.normal)').each(function() {
                $(this).select2({
                    dropdownParent: $(this).parent().parent()
                });
            });
        })

        function reset_from() {
            // $('#name').val("#").trigger('change').prop("disabled", false);
            $('.select2').val("#").trigger('change');
            document.getElementById("form-add").reset();
            $('.alert-danger').remove();
        }
    </script>
</body>

</html>