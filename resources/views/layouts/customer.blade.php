<!doctype html>
<html>

<head>

    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="author" content="Innovation Box">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- description -->


    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/images/apple-touch-icon-114x114.png')}}">

    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/reboot.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

</head>

<body>
@include('admin.partials.toasts')
    <header class="portal animated fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-4 align-self-center">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img class="img-fluid" src="assets/images/logo-dark.png">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-8">
                    <ul class="top-menus">
                        <li class="profile-top">
                            <a href="#">
                                @if($profile && $profile->avatar)
                                <img class="img-fluid pro-icon" src="{{asset('storage/'.$profile->avatar)}}">
                                @else
                                <img class="img-fluid pro-icon" src="{{asset('assets/images/profile-pic.jpg')}}">
                                @endif
                                <span class="pro-name">
                                    {{auth()->user()->name}}
                                    <em>{{auth()->user()->email}}</em>
                                </span>
                            </a>
                        </li>
                        <li class="lang-switch">
                            <a href="#">العربية</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <div class="content-area">
        <div class="container">
            <div class="row">

                <!-- Sidebar Starts -->

                @include('layouts.sidebar')

                <!-- Sidebar Ends -->

                @yield('content')


            </div>
        </div>
    </div>
    <footer class="footer-portal">
        Copyright 2023 <a href="index.html" class="text-light-gray">re-served.ae</a>, all rights reserved.
    </footer>

    <script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/my-custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/validate.js')}}"></script>

</body>

</html>