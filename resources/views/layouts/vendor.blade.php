<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="GeniusOcean">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ $gs->title }}</title>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset(access_public() . 'assets/images/' . $gs->favicon) }}" />
    <!-- Bootstrap -->
    <link href="{{ asset(access_public() . 'assets/vendor/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/vendor/css/fontawesome.css') }}">
    <!-- icofont -->
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/vendor/css/icofont.min.css') }}">
    <!-- Sidemenu Css -->
    <link href="{{ asset(access_public() . 'assets/vendor/plugins/fullside-menu/css/dark-side-style.css') }}"
        rel="stylesheet" />
    <link href="{{ asset(access_public() . 'assets/vendor/plugins/fullside-menu/waves.min.css') }}" rel="stylesheet" />

    <link href="{{ asset(access_public() . 'assets/vendor/css/plugin.css') }}" rel="stylesheet" />

    <link href="{{ asset(access_public() . 'assets/vendor/css/jquery.tagit.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset(access_public() . 'assets/vendor/css/bootstrap-coloroicker.css') }}">
    <!-- Main Css -->

    @if ($langg->rtl == '1')
        <link href="{{ asset(access_public() . 'assets/vendor/css/rtl/style.css') }}" rel="stylesheet" />
        <link href="{{ asset(access_public() . 'assets/vendor/css/rtl/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset(access_public() . 'assets/vendor/css/common.css') }}" rel="stylesheet">
        <link href="{{ asset(access_public() . 'assets/vendor/css/rtl/responsive.css') }}" rel="stylesheet" />
    @else
        <link href="{{ asset(access_public() . 'assets/vendor/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset(access_public() . 'assets/vendor/css/custom.css') }}" rel="stylesheet" />
        <link href="{{ asset(access_public() . 'assets/vendor/css/common.css') }}" rel="stylesheet">
        <link href="{{ asset(access_public() . 'assets/vendor/css/responsive.css') }}" rel="stylesheet" />
    @endif

    @yield('styles')

</head>

<body>
    <div class="page">
        <div class="page-main">
            <!-- Header Menu Area Start -->
            <div class="header">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <div class="menu-toggle-button">
                            <a class="nav-link" href="javascript:;" id="sidebarCollapse">
                                <div class="my-toggl-icon">
                                    <span class="bar1"></span>
                                    <span class="bar2"></span>
                                    <span class="bar3"></span>
                                </div>
                            </a>
                        </div>

                        <div class="right-eliment">
                            <ul class="list">


                                <li class="login-profile-area">
                                    <a class="dropdown-toggle-1" href="javascript:;">
                                        <div class="user-img">
                                            @if (Auth::user()->is_provider == 1)
                                                <img src="{{ asset(access_public() . 'assets/') }}/images/user-i.png"
                                                    alt="">
                                            @else
                                                <img src="{{ asset(access_public() . 'assets/') }}/images/user-i.png"
                                                    alt="">
                                            @endif
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdownmenu-wrapper">
                                            <ul>
                                                <h5>{{ $langg->lang431 }}</h5>



                                                <li>
                                                    <a href="{{ route('user-dashboard', ['lang' => $sign]) }}"><i
                                                            class="fas fa-sign-in-alt"></i> {{ $langg->lang17 }}</a>
                                                </li>


                                                <li>
                                                    <a href="{{ route('user-logout') }}"><i
                                                            class="fas fa-power-off"></i> {{ $langg->lang435 }}</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Menu Area End -->
            <div class="wrapper">
                <!-- Side Menu Area Start -->
                <nav id="sidebar" class="nav-sidebar">
                    <ul class="list-unstyled components" id="accordion">



                        <li>
                            <a href="{{ route('vendor-dashboard', ['lang' => $sign]) }}" class="wave-effect active"><i
                                    class="fa fa-home mr-2"></i>{{ $langg->lang441 }}</a>
                        </li>


                        <li>
                            <a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse"
                                aria-expanded="false">
                                <i class="icofont-cart"></i>{{ $langg->lang444 }}
                            </a>
                            <ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
                                <li>
                                    <a
                                        href="{{ route('vendor-prod-physical-create', ['lang' => $sign]) }}"><span>{{ $langg->lang518 }}</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('vendor-prod-index', ['lang' => $sign]) }}"><span>
                                            {{ $langg->lang443 }}</span></a>
                                </li>

                            </ul>
                        </li>

                        <!--	<li>
        <a href="#affiliateprod" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
         <i class="icofont-cart"></i>{{ $langg->lang447 }}
        </a>
        <ul class="collapse list-unstyled" id="affiliateprod" data-parent="#accordion">
         <li>
          <a href="{{ route('vendor-import-create') }}"><span>{{ $langg->lang448 }}</span></a>
         </li>
         <li>
          <a href="{{ route('vendor-import-index') }}"><span>{{ $langg->lang449 }}</span></a>
         </li>
        </ul>
       </li>


       <li>
        <a href="{{ route('vendor-prod-import') }}"><i class="fas fa-upload"></i>{{ $langg->lang450 }}</a>
       </li>-->


                    </ul>
                </nav>
                <!-- Main Content Area Start -->
                @yield('content')
                <!-- Main Content Area End -->
            </div>
        </div>
    </div>

    @php
        $curr = \App\Models\Currency::where('is_default', '=', 1)->first();
    @endphp

    <script type="text/javascript">
        var mainurl = "{{ url('/') }}";
        var admin_loader = {{ $gs->is_admin_loader }};
        var whole_sell = {{ $gs->wholesell }};
        var langg = {!! json_encode($langg) !!};
        var getattrUrl = '{{ route('vendor-prod-getattributes') }}';
        var curr = {!! json_encode($curr) !!};
    </script>

    <!-- Dashboard Core -->
    <script src="{{ asset(access_public() . 'assets/vendor/js/vendors/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/vendor/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/vendor/js/jqueryui.min.js') }}"></script>
    <!-- Fullside-menu Js-->
    <script src="{{ asset(access_public() . 'assets/vendor/plugins/fullside-menu/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/vendor/plugins/fullside-menu/waves.min.js') }}"></script>

    <script src="{{ asset(access_public() . 'assets/vendor/js/plugin.js') }}"></script>

    <script src="{{ asset(access_public() . 'assets/vendor/js/Chart.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/vendor/js/tag-it.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/vendor/js/nicEdit.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/vendor/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/vendor/js/notify.js') }}"></script>
    <script src="{{ asset(access_public() . 'assets/vendor/js/load.js') }}"></script>
    <!-- Custom Js-->
    <script src="{{ asset(access_public() . 'assets/vendor/js/custom.js') }}"></script>
    <!-- AJAX Js-->
    <script src="{{ asset(access_public() . 'assets/vendor/js/myscript.js') }}"></script>
    @yield('scripts')

    @if ($gs->is_admin_loader == 0)
        <style>
            div#geniustable_processing {
                display: none !important;
            }
        </style>
    @endif

</body>

</html>
