<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ @$page_title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
    <!-- iCheck -->
    {{-- <link rel="stylesheet" href=""{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> --}}

    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/datatables/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/datatables/datatable.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables/responsive.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatables/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">





    <style>
        .theme-switch {
            display: inline-block;
            height: 24px;
            position: relative;
            width: 50px;
        }

        .switch_theme {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            width: 3.5em;
            height: 1.5em;
            background: #ddd;
            border-radius: 3em;
            position: relative;
            cursor: pointer;
            outline: none;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        .switch_theme:checked {
            background: #333434;
        }

        .switch_theme:after {
            position: absolute;
            content: "";
            width: 1.5em;
            height: 1.5em;
            border-radius: 50%;
            background: #fff;
            -webkit-box-shadow: 0 0 .25em rgba(0, 0, 0, .3);
            box-shadow: 0 0 .25em rgba(0, 0, 0, .3);
            -webkit-transform: scale(.7);
            transform: scale(.7);
            left: 0;
            -webkit-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        .switch_theme:checked:after {
            left: calc(100% - 1.5em);
        }

        element {
            background-color: aqua !important;
        }

        [class*="sidebar-dark-"] .nav-sidebar>.nav-item.menu-open>.nav-link,
        [class*="sidebar-dark-"] .nav-sidebar>.nav-item:hover>.nav-link,
        [class*="sidebar-dark-"] .nav-sidebar>.nav-item>.nav-link:focus {
            background-color: #3498db !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed {{ setFont() }}">

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('images/loaders.jpg')}}" alt="" height="150"
                width="170">
        </div>

        <!-- Navbar -->
        @include('layouts.header')

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')


        <!-- Content Wrapper. Contains page content -->

        <main id="app">
            @yield('content')
        </main>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        const site_url = "{{ url('/') }}";
        var lang = "{{ Session::get('locale') }}";
    </script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/datatables/popper.min.js') }}"></script>
    <script src="{{ asset('js/datatables/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/datatables/datatable.js') }}"></script>
    <script src="{{ asset('js/datatables/datatable.bootstrap.js') }}"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
    <!-- DataTables JS -->
    <script src="{{ asset('js/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('js/datatables/buttons.html5.min.js') }}"></script>
    {{-- <script src="{{ asset('js/datatables/buttons.html5.min.js') }}"></script> --}}
    <script src="{{ asset('js/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/datatables/buttons.colVis.min.js') }}"></script>

    <script src="{{ asset('js/datatables/responsive.js') }}"></script>
    <script src="{{ asset('js/datatables/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script src="{{ asset('js/jquery-sortable-min.js') }}"></script>
    <script src="{{ asset('js/convert_unicode.js') }}"></script>

    <script src="{{ asset('js/master/common.js') }}"></script>



    {{-- <script src='http://sifarish.shangrilagroup.com.np/vendor/crudbooster/assets/jquery-sortable-min.js'></script> --}}
    <script type="text/javascript">
        $(function() {
            var id_cms_privileges = '1';
            var sortactive = $(".draggable-menu").sortable({
                group: '.draggable-menu',
                delay: 200,
                isValidTarget: function($item, container) {
                    var depth = 1, // Start with a depth of one (the element itself)
                        maxDepth = 2,
                        children = $item.find('ul').first().find('li');

                    // Add the amount of parents to the depth
                    depth += container.el.parents('ul').length;

                    // Increment the depth for each time a child
                    while (children.length) {
                        depth++;
                        children = children.find('ul').first().find('li');
                    }

                    return depth <= maxDepth;
                },
                onDrop: function($item, container, _super) {

                    if ($item.parents('ul').hasClass('draggable-menu-active')) {
                        var data = $('.draggable-menu-active').sortable("serialize").get();
                        var jsonString = JSON.stringify(data, null, ' ');
                    } else {
                        var data = $('.draggable-menu-inactive').sortable("serialize").get();
                        var jsonString = JSON.stringify(data, null, ' ');
                        $('#inactive_text').remove();
                    }


                    $.post(site_url + '/menumanagement/post-menu', {
                        menus: jsonString,
                        "_token": "{{ csrf_token() }}",
                    }, function(resp) {
                        toastr.options.timeOut = 10000;
                        toastr.success(resp.message);
                        var audio = new Audio('audio.mp3');
                        audio.play();
                        // $('#menu-saved-info').fadeIn('fast').delay(1000).fadeOut('fast');
                    });

                    _super($item, container);
                }
            });



        });
    </script>


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>



    <script>
        var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
        var currentTheme = localStorage.getItem('theme');
        var mainHeader = document.querySelector('.main-header');

        if (currentTheme) {
            if (currentTheme === 'dark') {
                if (!document.body.classList.contains('dark-mode')) {
                    document.body.classList.add("dark-mode");
                }
                toggleSwitch.checked = true;
            }
        }

        function switchTheme(e) {
            if (e.target.checked) {
                if (!document.body.classList.contains('dark-mode')) {
                    document.body.classList.add("dark-mode");
                }
                localStorage.setItem('theme', 'dark');
            } else {
                if (document.body.classList.contains('dark-mode')) {
                    document.body.classList.remove("dark-mode");
                }
                localStorage.setItem('theme', 'light');
            }
        }

        // toggleSwitch.addEventListener('change', switchTheme, false);


        document.getElementById('language-toggle').addEventListener('change', function() {
            const locale = this.checked ? 'en' : 'np';
            window.location.href = `/language/${locale}`;
        });
    </script>

    @include('layouts.footer')
    <script>
        toastr.options = {
            "newestOnTop": true,
            "progressBar": true,
        }
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':

                    toastr.options.timeOut = 10000;
                    toastr.info("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();
                    break;
                case 'success':

                    toastr.options.timeOut = 10000;
                    toastr.success("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'warning':

                    toastr.options.timeOut = 10000;
                    toastr.warning("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
                case 'error':

                    toastr.options.timeOut = 10000;
                    toastr.error("{{ Session::get('message') }}");
                    var audio = new Audio('audio.mp3');
                    audio.play();

                    break;
            }
        @endif
    </script>
    @yield('js')
</body>

</html>
