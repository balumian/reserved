<!doctype html>
<html>
<head>
	
<title>@yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="Innovation Box">
<!-- description -->


<!-- favicon -->
<link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
<link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon-57x57.png')}}">
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/images/apple-touch-icon-72x72.png')}}">
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/images/apple-touch-icon-114x114.png')}}">

<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{asset('assets/css/jquery.fancybox.min.css')}}" rel="stylesheet" type="text/css" media="all"/>	
<link href="{{asset('assets/css/reboot.css')}}" rel="stylesheet" type="text/css" media="all"/>
<link href="{{asset('assets/css/menu.css')}}" rel="stylesheet" type="text/css" media="all"/>		
<link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" type="text/css" media="all"/>		
<link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
</head>

<body class="@yield('body-class')">


@yield('content')


<script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/owl.carousel.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/my-custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/validate.js')}}"></script>
	
</body>
</html>