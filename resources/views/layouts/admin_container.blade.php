<!DOCTYPE html>
<!--[if IE 8]>
<html lang="ar" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="ar" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="ar">

<head>
    <meta charset="utf-8"/>
    <title>SkayMax</title>
    <link href="{{asset('admin_assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin_assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin_assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin_assets/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="{{asset('admin_assets/layouts/layout/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/layouts/layout/css/themes/darkblue-rtl.min.css')}}" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="{{asset('admin_assets/layouts/layout/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/css/login-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('admin_assets/img/logo.png')}}" rel="shortcut icon">


</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{url('/')}}">
                    <img src="{{asset('admin_assets/img/logo.png')}}" height="50px" alt="logo" class="logo-default"/> </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
                <span></span>
            </a>
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle"
                                 src="{{asset('admin_assets/img/logo.png')}}"/>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- END LOGO -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN Left SIDE BAR -->
        <div class="left-side page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar navbar-collapse collapse">

                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                    data-slide-speed="200" style="padding-top: 20px">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>

                    <li class="categories nav-item  ">
                        <a href="{{url("admin/categories")}}" class="nav-link nav-toggle">
                            <i class="icon-diamond"></i>
                            <span class="title">Categories</span>

                        </a>
                    </li>
                    <li class="sub_categories nav-item  ">
                        <a href="{{url('admin/sub_categories')}}" class="nav-link nav-toggle">
                            <i class="icon-diamond"></i>
                            <span class="title">Sub categories</span>
                        </a>
                    </li>
                    <li class="products nav-item  ">
                        <a href="{{url('admin/products')}}" class="nav-link nav-toggle">
                            <i class="icon-diamond"></i>
                            <span class="title">Products</span>
                        </a>
                    </li>
                    <li class="users nav-item  ">
                        <a href="{{url("admin/users")}}" class="nav-link nav-toggle">
                            <i class="icon-diamond"></i>
                            <span class="title">Users</span>

                        </a>

                    </li>

                </ul>

            </div>
            <!-- END SIDEBAR -->
        </div>

        @yield('content')

    </div>

    <!-- END  Left SIDE BAR  -->
    <div class="page-footer">
        <div class="page-footer-inner text-center" style="width: 100%">
            opyrights@SKYMAX.2018. <span>All Rights Reserved.</span> Powered By <a
                    href="{{asset("assets/")}}/http://paladox.com" target="_blank">PALADOX</a></p>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->

    <!-- END FOOTER -->
</div>
</body>

<script src="{{asset('admin_assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/js/jquery.nicescroll.min.js')}}" type="text/javascript"></script>

<!-- icheck checkboxes -->
<script src="{{asset('admin_assets/js/style.js')}}" type="text/javascript"></script>
@yield('scripts')
<script>
    function ConfirmDelete() {

        var x = confirm("هل حقا تريد الحذف ؟");
        if (x)
            return true;
        else
            return false;
    }
</script>


</html>
