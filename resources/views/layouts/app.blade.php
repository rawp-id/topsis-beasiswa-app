<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Beasiswa App">
    <meta name="author" content="rawp">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">

    <title>Beasiswa App</title>

    <!-- vendor css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('lib/remixicon/fonts/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/jqvmap/jqvmap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('lib/prismjs/themes/prism-vs.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.landing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.dashboard.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/dashforge.demo.css') }}">

    <style>
        .modal-backdrop {
            background: rgba(0, 0, 0, 0.2) !important;
        }
    </style>

    @vite([])

    @livewireStyles
</head>

<body class="home-body">


    @if ($dashboard ?? false)
        @include('layouts.aside')

        <div class="content ht-100v pd-0">
            <div class="content-header">
                <div class="content-search">
                    {{-- <i data-feather="search"></i>
                  <input type="search" class="form-control" placeholder="Search..."> --}}
                </div>
                <nav class="nav">
                    {{-- <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
                  <a href="" class="nav-link"><i data-feather="grid"></i></a> --}}
                    {{-- <a href="" class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="Profile"
                        style="border-radius: 50px"><i data-feather="user"></i></a> --}}
                </nav>
            </div><!-- content-header -->

            @yield('content-dashboard')

            {{-- {{ $slot }} --}}

        </div>
    @else
        @include('layouts.navbar')
        @yield('content')
    @endif


    {{-- @include('layouts.aside')


    @yield('content') --}}


    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('lib/ionicons/ionicons/ionicons.esm.js') }}" type="module"></script>
    <script src="{{ asset('lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('lib/jquery.flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('lib/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('lib/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('lib/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('lib/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('lib/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('lib/jquery-steps/build/jquery.steps.min.js') }}"></script>

    <script src="{{ asset('lib/prismjs/prism.js') }}"></script>
    <script src="{{ asset('lib/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/js/dashforge.js') }}"></script>
    <script src="{{ asset('assets/js/dashforge.aside.js') }}"></script>
    <script src="{{ asset('assets/js/dashforge.sampledata.js') }}"></script>

    <!-- append theme customizer -->
    <script src="{{ asset('lib/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard-one.js') }}"></script>
    <script src="{{ asset('assets/js/dashforge.settings.js') }}"></script>

    <script>
        document.addEventListener('livewire:navigated', () => {

            $('#tableData').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            // Select2
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity
            });

            $('#wizard1').steps({
                headerTag: 'h3',
                bodyTag: 'section',
                autoFocus: true,
                titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
            });

        }, {
            once: true
        })
    </script>

    @livewireScripts
</body>

</html>
