  <?php
  
  $features = App\Models\Feature::all();
  $l = DB::table('languages')->where('is_default', '=', 1)->first();
  
  ?>

  <!doctype html>
  <html lang="en" dir="ltr">

  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="author" content="GeniusOcean">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Title -->
      <title>{{ $gs->title }}</title>
      <!-- favicon -->
      <link rel="icon" type="image/x-icon" href="{{ asset(access_public() . 'assets/images/' . $gs->favicon) }}" />
      <!-- Bootstrap -->

      @if ($gs->light_dark == 0)
          <link href="{{ asset(access_public() . 'assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
      @else
          <link href="{{ asset(access_public() . 'assets/admin/css/light/bootstrap.min.css') }}" rel="stylesheet" />
      @endif

      <!-- Fontawesome -->
      <link rel="stylesheet" href="{{ asset(access_public() . 'assets/admin/css/fontawesome.css') }}">


  </head>

  <body>

  </body>

  </html>

  <!-- icofont -->
  <link rel="stylesheet" href="{{ asset(access_public() . 'assets/admin/css/checkbox.css') }}">
  <link rel="stylesheet" href="{{ asset(access_public() . 'assets/admin/css/icofont.min.css') }}">
  <!-- Sidemenu Css -->
  @if ($gs->light_dark == 0)
      <link href="{{ asset(access_public() . 'assets/admin/plugins/fullside-menu/css/dark-side-style.css') }}"
          rel="stylesheet" />
  @else
      <link href="{{ asset(access_public() . 'assets/admin/plugins/fullside-menu/css/light/dark-side-style.css') }}"
          rel="stylesheet" />
  @endif
  <link href="{{ asset(access_public() . 'assets/admin/plugins/fullside-menu/waves.min.css') }}" rel="stylesheet" />

  <!--		<link href="{{ asset(access_public() . 'assets/admin/css/plugin.css') }}" rel="stylesheet" />
-->
  <link href="{{ asset(access_public() . 'assets/admin/css/jquery.tagit.css') }}" rel="stylesheet" />
  <script src="{{ asset(access_public() . 'assets/admin/js/atag-it.js') }}"></script>
  <link rel="stylesheet" href="{{ asset(access_public() . 'assets/admin/css/bootstrap-coloroicker.css') }}">
  <!-- Main Css -->

  <!-- stylesheet -->
  @if (DB::table('admin_languages')->where('is_default', '=', 1)->first()->rtl == 1)





      @if ($gs->light_dark == 1)
          <link href="{{ asset(access_public() . 'assets/admin/rtl/light/style.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/css/rtl/customs.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/rtl/light/responsive.css') }}" rel="stylesheet" />
      @else
          <link href="{{ asset(access_public() . 'assets/admin/css/rtl/style.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/css/rtl/custom.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/css/rtl/responsive.css') }}" rel="stylesheet" />
      @endif
  @else
      @if ($gs->light_dark == 1)
          <link href="{{ asset(access_public() . 'assets/admin/css/light/style.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/css/light/style_lite.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/css/light/custom.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/css/light/responsive.css') }}" rel="stylesheet" />
      @else
          <link href="{{ asset(access_public() . 'assets/admin/css/style.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/css/custom.css') }}" rel="stylesheet" />
          <link href="{{ asset(access_public() . 'assets/admin/css/responsive.css') }}" rel="stylesheet" />
      @endif










  @endif




  <link href="{{ asset(access_public() . 'assets/admin/css/common.css') }}" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" />
  @if ($gs->light_dark == 0)
      <link href="{{ asset(access_public() . 'assets/admin/css/plugin.css') }}" rel="stylesheet" />
  @else
      <link href="{{ asset(access_public() . 'assets/admin/css/light/plugin.css') }}" rel="stylesheet" />
  @endif

  <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset(access_public() . 'assets/front/css/sweetalert.css') }}">



  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
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

                                  <li class="bell-area">
                                      @if ($gs->light_dark == 0)
                                          <a id="notf_conv" class="dropdown-toggle-1" data-toggle="tooltip"
                                              title="Go To light" href="{{ route('admin.mode', 1) }}">
                                              <i class="fas fa-sun"></i>
                                          </a>
                                      @else
                                          <a id="notf_conv" class="dropdown-toggle-1" data-toggle="tooltip"
                                              title="Go To Dark" href="{{ route('admin.mode', 0) }}">
                                              <i class="fas fa-moon"></i>
                                          </a>
                                      @endif
                                  </li>


                                  <li class="bell-area">

                                      <a id="notf_conv" class="dropdown-toggle-1" target="_blank"
                                          href="{{ route('front.index', $l->id == 1 ? 'en' : 'ar') }}">
                                          <i class="fas fa-globe-americas"></i>
                                      </a>

                                  </li>


                                  <li class="bell-area">
                                      <a id="notf_conv" class="dropdown-toggle-1" href="javascript:;">
                                          <i class="far fa-envelope"></i>
                                          <span data-href="{{ route('conv-notf-count') }}"
                                              id="conv-notf-count">{{ App\Models\Notification::countConversation() }}</span>
                                      </a>
                                      <div class="dropdown-menu">
                                          <div class="dropdownmenu-wrapper" data-href="{{ route('conv-notf-show') }}"
                                              id="conv-notf-show">
                                          </div>
                                      </div>
                                  </li>

                                  <li class="bell-area">
                                      <a id="notf_product" class="dropdown-toggle-1" href="javascript:;">
                                          <i class="icofont-cart"></i>
                                          <span data-href="{{ route('product-notf-count') }}"
                                              id="product-notf-count">{{ App\Models\Notification::countProduct() }}</span>
                                      </a>
                                      <div class="dropdown-menu">
                                          <div class="dropdownmenu-wrapper"
                                              data-href="{{ route('product-notf-show') }}" id="product-notf-show">
                                          </div>
                                      </div>
                                  </li>

                                  <li class="bell-area">
                                      <a id="notf_user" class="dropdown-toggle-1" href="javascript:;">
                                          <i class="far fa-user"></i>
                                          <span data-href="{{ route('user-notf-count') }}"
                                              id="user-notf-count">{{ App\Models\Notification::countRegistration() }}</span>
                                      </a>
                                      <div class="dropdown-menu">
                                          <div class="dropdownmenu-wrapper" data-href="{{ route('user-notf-show') }}"
                                              id="user-notf-show">
                                          </div>
                                      </div>
                                  </li>

                                  <li class="bell-area">
                                      <a id="notf_order" class="dropdown-toggle-1" href="javascript:;">
                                          <i class="far fa-newspaper"></i>
                                          <span data-href="{{ route('order-notf-count') }}"
                                              id="order-notf-count">{{ App\Models\Notification::countOrder() }}</span>
                                      </a>
                                      <div class="dropdown-menu">
                                          <div class="dropdownmenu-wrapper"
                                              data-href="{{ route('order-notf-show') }}" id="order-notf-show">
                                          </div>
                                      </div>
                                  </li>

                                  <li class="login-profile-area">
                                      <a class="dropdown-toggle-1" href="javascript:;">
                                          <div class="user-img">
                                              <img src="{{ Auth::guard('admin')->user()->photo ? asset(access_public() . 'assets/images/admins/' . Auth::guard('admin')->user()->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                                  alt="">
                                          </div>
                                      </a>
                                      <div class="dropdown-menu">
                                          <div class="dropdownmenu-wrapper">
                                              <ul>
                                                  <h5>{{ __('Welcome!') }}</h5>
                                                  <li>
                                                      <a href="{{ route('admin.profile') }}"><i
                                                              class="fas fa-user"></i> {{ __('Edit Profile') }}</a>
                                                  </li>
                                                  <li>
                                                      <a href="{{ route('admin.password') }}"><i
                                                              class="fas fa-cog"></i> {{ __('Change Password') }}</a>
                                                  </li>
                                                  <li>
                                                      <a href="{{ route('admin.logout') }}"><i
                                                              class="fas fa-power-off"></i> {{ __('Logout') }}</a>
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
                              <a href="{{ route('admin.dashboard') }}" class="wave-effect active"><i
                                      class="fa fa-home mr-2"></i>{{ __('Dashboard') }}</a>
                          </li>
                          @if (Auth::guard('admin')->user()->IsSuper())
                              @include('includes.admin.roles.super')
                          @else
                              @include('includes.admin.roles.normal')
                          @endif

                      </ul>
                      @if (Auth::guard('admin')->user()->IsSuper())
                          <p class="version-name"> Vowalaa V.2</p>
                      @endif
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
          var getattrUrl = '{{ route('admin-prod-getattributes') }}';
          var curr = {!! json_encode($curr) !!};
          // console.log(curr);
      </script>

      <!-- Dashboard Core -->
      <script src="{{ asset(access_public() . 'assets/admin/js/vendors/jquery-1.12.4.min.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/js/vendors/vue.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/js/vendors/bootstrap.min.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/js/jqueryui.min.js') }}"></script>
      <!-- Fullside-menu Js-->
      <script src="{{ asset(access_public() . 'assets/admin/plugins/fullside-menu/jquery.slimscroll.min.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/plugins/fullside-menu/waves.min.js') }}"></script>

      <script src="{{ asset(access_public() . 'assets/admin/js/plugin.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/js/Chart.min.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/js/tag-it.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/js/nicEdit.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/js/bootstrap-colorpicker.min.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/admin/js/notify.js') }}"></script>

      <script src="{{ asset(access_public() . 'assets/admin/js/jquery.canvasjs.min.js') }}"></script>

      <script src="{{ asset(access_public() . 'assets/admin/js/load.js') }}"></script>
      <!-- Custom Js-->
      <script src="{{ asset(access_public() . 'assets/admin/js/custom.js') }}"></script>
      <!-- AJAX Js-->
      <script src="{{ asset(access_public() . 'assets/admin/js/myscript.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/front/js/sweetalert-dev.js') }}"></script>
      <script src="{{ asset(access_public() . 'assets/front/js/sweetalert.min.js') }}"></script>


      <!--<script src="{{ asset(access_public() . 'assets/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>-->
      <!-- <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>-->
      <!--	<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>-->
      <!--   <script src="{{ asset(access_public() . 'assets/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>-->

      <script>
          tinymce.init({
              selector: '#text',

          });
      </script>

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
