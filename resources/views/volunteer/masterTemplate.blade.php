<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN - @yield('menu-name')</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/bootstrap-tags/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet"
        href="{{ asset('admin_assets/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/dist/css/adminlte.min.css')}}">
    <script src="{{ asset('admin_assets/assets/plugins/jquery/jquery.min.js')}}"></script>
    <style>
        hr.style18:before {
            display: block;
            content: "";
            height: 30px;
            margin-top: -31px;
            border-style: solid;
            border-color: #8c8b8b;
            border-width: 0 0 1px 0;
            border-radius: 20px;
        }
        @media print {
            #printPageButton {
                display: none;
            }
        }
        .zoom:hover {
            transform: scale(3.5);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="btn btn-info" style="color: white"><i class="fa fa-chevron-circle-left"></i>
                        WEBSITE</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li>
                    <!--<a href="{{ route('logout')}}" style="color: red">
                                                    <i class="ace-icon fa fa-power-off"></i>
                                                    Logout
                                                </a>-->
                    <a style="color: red" class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                        <i class="ace-icon fa fa-power-off"></i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('volunteer.include.menu')

        <!-- /.content-wrapper -->

        @yield('main-content')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('volunteer.include.footer')
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('admin_assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}">
    </script>
    <script src="{{ asset('admin_assets/assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script
        src="{{ asset('admin_assets/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}">
        </script>
    <script src="{{ asset('admin_assets/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/dist/js/adminlte.min.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/dist/js/demo.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/bootstrap-tags/bootstrap-tagsinput.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('admin_assets/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}">
    </script>
    <script src="{{ asset('admin_assets/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}">
    </script>
    <script src="{{ asset('admin_assets/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });
            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                        'MMMM D, YYYY'))
                }
            )
            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()
            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()
            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });
            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })
    </script> 
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
</body>

</html>
