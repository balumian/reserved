<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Reserved | Dashboard &amp; Web App Management Tool</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/images/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/images/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/images/apple-touch-icon-114x114.png')}}">

    <link rel="manifest" href="{{asset('admin/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('admin/assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{asset('admin/assets/js/config.js')}}"></script>
    <script src="{{asset('admin/vendors/simplebar/simplebar.min.js')}}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{asset('admin/assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset('admin/assets/css/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('admin/assets/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('admin/assets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">

    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <div class="row flex-center min-vh-100 py-6">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href="{{url('/')}}"><img class="me-2" src="{{asset('assets/images/logo-login-dark.png')}}" alt="" width="210" /></a>
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <div class="text-center"><img class="d-block mx-auto mb-4" src="{{asset('admin/assets/img/icons/spot-illustrations/16.png')}}" alt="Email" width="100" />
                                <h4 class="mb-2">Verification is pending!</h4>
                                <p>We will review your business details. Once we have done we will send you a confirmation email.
                                </p><a class="btn btn-primary btn-sm mt-3" href="{{route('business.logout')}}"><span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->





    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{asset('admin/vendors/popper/popper.min.js')}}"></script>
    <script src="{{asset('admin/vendors/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/vendors/anchorjs/anchor.min.js')}}"></script>
    <script src="{{asset('admin/vendors/is/is.min.js')}}"></script>
    <script src="{{asset('admin/vendors/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('admin/vendors/fontawesome/all.min.js')}}"></script>
    <script src="{{asset('admin/vendors/lodash/lodash.min.js')}}"></script>
    <script src=""></script>
    <script src="{{asset('admin/vendors/list.js/list.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/theme.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/assets/js/validate.js')}}"></script>
    
</body>

</html>