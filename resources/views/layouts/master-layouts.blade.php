<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Dashboard | Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
    {{--        @include('layouts.head')--}}
    @if ( Config::get('app.locale') == 'ar')
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet"
              type="text/css"/>
        <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css"/>
    @else
        <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('assets/css/app.min.css')}}" id="app-light" rel="stylesheet" type="text/css" />
    @endif
    @yield('css')
</head>

@yield('body')
<div id="preloader">
    <div id="status">
        <div class="spinner-chase">
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
            <div class="chase-dot"></div>
        </div>
    </div>
</div>
<!-- Begin page -->
<div id="layout-wrapper">
    @include('layouts.topbar')
    @if ($errors->any())


        @foreach ($errors->all() as $error)
            <div class="alert alert-danger bg-danger text-white mb-0 border-0" role="alert">
                <strong>Oh snap!</strong>{{ $error }}
            </div>
        @endforeach

    @endif

    @if (\Session::has('success'))
        <div class="alert alert-success bg-success text-white border-0" role="alert">
            <strong>Well done!</strong> {!! \Session::get('success') !!}
        </div>
@endif
@include('layouts.sidebar')
<!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            @if (\Session::has('success'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! \Session::get('success') !!}</strong>
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <strong>{!! $error !!} </strong>

                    </div>
                @endforeach
            @endif
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('layouts.right-sidebar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
@include('layouts.footer-script')
</body>
</html>