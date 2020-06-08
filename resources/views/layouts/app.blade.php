<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>Impact Trading Center</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


    <!-- global css -->
    <link type="text/css" href="{{asset('assets/css/app.css')}}" rel="stylesheet"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

@yield('css')
<!--page level css -->

    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/simple_themify.css')}}">

    <script src="{{asset('assets/js/sweetalert2/dist/sweetalert2.all.js')}}"></script>

    <script src="{{asset('assets/js/sweetalert2/dist/sweetalert2.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/js/sweetalert2/dist/sweetalert2.css')}}">

    <link rel="stylesheet" href="{{asset('assets/vendors/animate/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendors/pnotify/css/pnotify.css')}}">
    <link href="{{asset('assets/vendors/pnotify/css/pnotify.brighttheme.css" rel="stylesheet" type="text/css')}}"/>
    <link href="{{asset('assets/vendors/pnotify/css/pnotify.buttons.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/vendors/pnotify/css/pnotify.mobile.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/vendors/pnotify/css/pnotify.history.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/toastr_notificatons.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/layouts.css')}}">
    <!--end page level css-->
</head>

<body class="skin-default movable-header">

<div class="preloader">
    <div class="loader_img"><img src="{{asset('assets/img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->

<header class="header header_movable">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="index.html" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="{{asset('assets/img/logo.png')}}" alt="logo"/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw ti-menu"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-fw ti-email black"></i>
                        <span class="label label-success">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages table-striped">
                        <li class="dropdown-title">New Messages</li>
                        <li class="dropdown-footer"><a href="#">View All messages</a></li>
                    </ul>

                </li>
                <!--rightside toggle-->
                <li>
                    <a href="#" class="dropdown-toggle toggle-right">
                        <i class="fa fa-fw ti-view-list black"></i>
                        <span class="label label-danger">9</span>
                    </a>
                </li>
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <img src="{{asset('assets/img/authors/avatar1.jpg')}}" width="35"
                             class="img-circle img-responsive pull-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                {{ Auth::user()->nom.' '.Auth::user()->prenom}}
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('assets/img/authors/avatar1.jpg')}}" class="img-circle" alt="User Image">
                            <p>{{ Auth::user()->nom.' '.Auth::user()->prenom}}</p>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3">
                            <a href="user_profile.html">
                                <i class="fa fa-fw ti-user"></i> My Profile
                            </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="edit_user.html">
                                <i class="fa fa-fw ti-settings"></i> Account Settings
                            </a>
                        </li>
                        <li role="presentation" class="divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">

                                <a href="{{ route('logout') }}"

                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-fw ti-shift-right"></i>
                                    {{ __('Deconnexion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div id="clientApp" class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="#">
                            <img src="{{asset('assets/img/authors/avatar1.jpg')}}" class="img-circle" alt="User Image">
                        </a>
                        <div class="content-profile">
                            <h4 class="media-heading">
                                {{Auth::user()->nom .' '.Auth::user()->prenom }}

                            </h4>
                            <ul class="icon-list">
                                <li>
                                    <a href="users.html">
                                        <i class="fa fa-fw ti-user"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="lockscreen.html">
                                        <i class="fa fa-fw ti-lock"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="edit_user.html">
                                        <i class="fa fa-fw ti-settings"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="login.html">
                                        <i class="fa fa-fw ti-shift-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    @hasanyrole('utilisateur')
                    <li>
                        <a href="{{route('investissement')}}">
                            <i class="menu-icon ti-user"></i>
                            <span class="mm-text ">Mes investissements</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('portefeuille')}}">
                            <i class="menu-icon ti-user"></i>
                            <span class="mm-text ">Mon portefeuille</span>
                        </a>
                    </li>
                    @endhasanyrole


                </ul>
                <!-- / .navigation -->
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-side">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <!--section starts-->

            <h1>
                @yield('linkTitle')
                <div class="pull-right">
                    @yield('link-right')
                </div>
            </h1>
            <ol class="breadcrumb">
                @yield('link')
            </ol>


        </section>
        <section class="content">
            <div class="outer">
                @yield('content')
            </div>

            <div class="background-overlay"></div>
        </section>


        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div>

<!-- ./wrapper -->
<!-- global js -->
<script src="{{asset('assets/js/app.js')}}" type="text/javascript"></script>
<!-- end of global js -->
<script type="text/javascript" src="{{asset('assets/js/custom_js/sweetalert.js')}}"></script>
<script src="{{asset('assets/js/custom_js/page.js')}}"></script>
@yield('script')
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.animate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.buttons.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.confirm.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.nonblock.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.mobile.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.desktop.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.history.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.callbacks.js')}}"></script>
<script src="{{asset('assets/js/custom_js/notifications.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/custom_js/layout_custom.js')}}"></script>

<script src="{{ mix('js/clientApp.js') }}" defer></script>
{{--<script src="{{mix('js/clientApp.js')}}" type="text/javascript"></script>--}}

</body>

</html>
