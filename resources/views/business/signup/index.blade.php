<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Reserved | Business &amp; Management Tool</title>


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
    <!-- <link href="{{asset('admin/assets/css/custom.css')}}" rel="stylesheet"> -->
    <link href="{{asset('admin/vendors/simplebar/simplebar.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/assets/css/theme-rtl.min.css')}}" rel="stylesheet" id="style-rtl">
    <link href="{{asset('admin/assets/css/theme.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('admin/assets/css/user-rtl.min.css')}}" rel="stylesheet" id="user-style-rtl">
    <link href="{{asset('admin/assets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <link href="{{asset('assets/css/notify.css')}}" rel="stylesheet" id="user-style-default">
    <link href="{{asset('assets/css/prettify.css')}}" rel="stylesheet" id="user-style-default">
    <style>
        .disable-link:hover {
            text-decoration: none;
            width: auto;
        }

        .right-text {
            text-align: right;
            padding-right: 0px;
            margin-right: 0px;
        }

        .min-vh-30 {
            min-height: 30vh !important;
        }

        .error {
            color: rgb(230, 55, 87);
            display: block;
            width: 100%;
        }
    </style>
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
                <div class="col-sm-12 col-md-12 col-lg-10 col-xl-8 col-xxl-8"><a class="d-flex flex-center mb-4" href="{{url('/')}}"><img class="me-2" src="{{asset('assets/images/logo-login-dark.png')}}" alt="" width="210" /></a>
                    <div class="card">
                        <div class="card-body p-4 p-sm-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="theme-wizard mb-5">
                                        <div class="bg-light pt-3 pb-2">
                                            <ul class="nav justify-content-between nav-wizard">
                                                <li class="nav-item"><a style="pointer-events: none;" class="nav-link active fw-semi-bold" href="#bootstrap-wizard-tab1" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-lock"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Account</span></a></li>
                                                <li class="nav-item"><a style="pointer-events: none;" class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab2" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-location-arrow"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Address</span></a></li>
                                                <li class="nav-item"><a style="pointer-events: none;" class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab3" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-briefcase"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Business</span></a>
                                                </li>
                                                <li class="nav-item"><a style="pointer-events: none;" class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab4" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-thumbs-up"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Done</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="py-4">
                                            <div class="tab-content">
                                                <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">
                                                    <form id="bussiness-account">
                                                        <div class="row g-2">
                                                            <div class="col-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="bootstrap-wizard-wizard-name">Name <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" id="name" name="name" placeholder="John Smith" id="bootstrap-wizard-wizard-name" required />
                                                                    <h6 class="text-danger">{{$errors->first('name')}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="bootstrap-wizard-wizard-email">Email
                                                                        <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="email" id="email" name="email" placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" id="bootstrap-wizard-wizard-email" data-wizard-validate-email="true" />
                                                                    <h6 class="text-danger">{{$errors->first('email')}}
                                                                    </h6>
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="bootstrap-wizard-wizard-password">Password
                                                                        <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="password" id="password" name="password" placeholder="Password" id="bootstrap-wizard-wizard-password" data-wizard-validate-password="true" required />
                                                                    <h6 class="text-danger">
                                                                        {{$errors->first('password')}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="bootstrap-wizard-wizard-confirm-password">Confirm
                                                                        Password
                                                                        <span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" id="bootstrap-wizard-wizard-confirm-password" data-wizard-validate-confirm-password="true" required />
                                                                    <h6 class="text-danger">
                                                                        {{$errors->first('password_confirmation')}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 right-text mt-3">
                                                                <button class="btn btn-primary px-5 px-sm-6" type="submit" id="step-one">Next<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab2" id="bootstrap-wizard-tab2">
                                                    <form id="bussiness-address">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="nationality">Nationality <span class="text-danger">*</span></label>
                                                                    <select class="form-select" name="nationality" id="nationality">
                                                                        <option value="">Select your nationality ...
                                                                        </option>
                                                                        @foreach($countries as $country)
                                                                        <option value="{{$country->id}}">
                                                                            {{$country->name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                                                                    <div class="input-group mb-3">
                                                                        <select class="form-select mb-3" name="code" id="code" style="max-width: 120px;">
                                                                            @foreach(get_dialing_code() as $code)
                                                                            <option value="{{$code}}" @if($code=='+971' ) selected @endif>
                                                                                {{$code}}
                                                                            </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <input class="form-control mb-3" id="phone" type="text" placeholder="501122333" name="phone" id="phone" required />
                                                                    </div>
                                                                    <h6 class="text-danger">{{$errors->first('phone')}}
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="emirate">Emirates
                                                                        <span class="text-danger">*</span></label>
                                                                    <select class="form-select" name="emirate" id="emirate" onchange="get_areas(this);">
                                                                        <option value="">Select emirates ...</option>
                                                                        @foreach($emirates as $emirate)
                                                                        <option value="{{$emirate->id}}">
                                                                            {{$emirate->name}}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="area">Area <span class="text-danger">*</span></label>
                                                                    <select class="form-select" name="area" id="area">
                                                                        <option value="">Select area ...</option>
                                                                        <!-- @foreach($areas as $area)
                                                                        <option value="{{$area->id}}">{{$area->name}}
                                                                        </option>
                                                                        @endforeach -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="address">Address</label>
                                                                    <textarea class="form-control" rows="4" id="address" name="address"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 right-text mt-3">
                                                                <button class="btn btn-primary px-5 px-sm-6" type="submit">Next<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3">
                                                                    </span></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab3" id="bootstrap-wizard-tab3">
                                                    <form id="bussiness-documents">
                                                        <div class="row g-2">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="name">Business Name
                                                                        (EN) <span class="text-danger">*</span></label>
                                                                    <input class="form-control" placeholder="Restaurant Name" name="name" type="text" id="name" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 right-text">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="name_ar"><span class="text-danger">*</span> (AR) اسم
                                                                        تجاري</label>
                                                                    <input class="form-control right-text" placeholder="اسم تجاري" name="name_ar" type="text" id="name_ar" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="formFileSm" class="form-label">Residence
                                                                        ID (Front) <span class="text-danger">*</span></label>
                                                                    <input class="form-control form-control-sm" id="residence_front" name="residence_front" type="file" accept=".gif, .jpg, .png, .pdf" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="formFileSm" class="form-label">Residence
                                                                        ID (Back) <span class="text-danger">*</span></label>
                                                                    <input class="form-control form-control-sm" id="residence_back" name="residence_back" type="file" accept=".gif, .jpg, .png, .pdf" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="formFileSm" class="form-label">Passport
                                                                        <span class="text-danger">*</span></label>
                                                                    <input class="form-control form-control-sm" id="passport" name="passport" type="file" accept=".gif, .jpg, .png, .pdf" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="formFileSm" class="form-label">Trade
                                                                        Licence <span class="text-danger">*</span></label>
                                                                    <input class="form-control form-control-sm" id="trade_license" name="trade_license" accept=".gif, .jpg, .png, .pdf" type="file" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="license">License
                                                                        No</label>
                                                                    <input class="form-control" placeholder="XXXX" name="license" type="text" id="license" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="vat">Vat No</label>
                                                                    <input class="form-control" placeholder="TRX" name="vat" type="text" id="vat" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12 right-text mt-3">
                                                                <button class="btn btn-primary px-5 px-sm-6" type="submit">Next<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3">
                                                                    </span></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab4" id="bootstrap-wizard-tab4">
                                                    <form method="post" action="{{route('business.step4')}}">
                                                        @csrf
                                                        <div class="text-center">
                                                            <div class="wizard-lottie-wrapper pb-5">
                                                                <div class="lottie wizard-lottie mx-auto my-1" data-options='{"path":"{{asset('admin/assets/img/animated-icons/celebration.json')}}"}'>
                                                                </div>
                                                            </div>
                                                            <h4 class="mb-1">Business account is all set!</h4>
                                                            <button class="btn btn-primary px-5 my-3" type="submit">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="card-footer bg-light">
                        <div class="px-sm-3 px-md-5">
                            <ul class="pager wizard list-inline mb-0">
                                <li class="previous">
                                    <button class="btn btn-link ps-0" type="button"><span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span>Prev</button>
                                </li>
                                <li class="next">
                                    <button class="btn btn-primary px-5 px-sm-6" type="submit">Next<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span></button>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                                    </div>
                                </div>
                            </div>
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
    <script type="text/javascript" src="{{asset('assets/js/notify.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/prettify.js')}}"></script>
    @include('admin.partials.jquery')

    <script type="text/javascript">
        function get_areas(input) {
            let emirate = false;
            emirate = $(input).val();
            if (emirate) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{route('get.specific.areas')}}",
                    data: {
                        data_id: emirate,
                    },
                    success: function(data) {
                        $('#area').html('<option value="">Select area ...</option>');
                        $.each(data.areas, function(key, value) {
                            $("#area").append('<option value="' + key +
                                '">' + value + '</option>');
                        });
                    }

                });
            }


        }

        $(document).ready(function() {
            // Account Form Submit
            $('#bussiness-account').on('submit', function(event) {
                // Ajax Header Setup
                $.ajaxSetup({
                    // Token
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                event.preventDefault();
                // declarations
                let formData = new FormData(this);
                //  Ajax post
                $.ajax({
                    type: 'POST',
                    url: "{{ route('business.step1') }}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success) {
                            $.notify(data.success, {
                                type: "success",
                                align: "right",
                                verticalAlign: "bottom",
                                color: "#fff",
                                background: "#20D67B"
                            });

                            // $("#success .toast-body").text(data.success);
                            // $("#error .toast").hide();
                            // $("#success .toast").show().delay(5000).queue(function() {
                            //     $(this).hide();
                            //     $(this).dequeue();
                            // });
                            let curr = $('.nav-wizard .nav-link.active');
                            let next = $(curr).parent().next().find('a');
                            $(curr).removeClass('active');
                            $(curr).addClass('done');
                            $($(curr).attr('href')).removeClass('active');
                            $(next).addClass('active');
                            $($(next).attr('href')).addClass('active');

                        } else {
                            $.notify(data.error, {
                                type: "error",
                                color: "#fff",
                                align: "right",
                                verticalAlign: "bottom",
                                background: "#D44950",
                            });
                            // $("#error .toast-body").text(data.error);
                            // $("#success .toast").hide();
                            // $("#error .toast").show().delay(9000).queue(function() {
                            //     $(this).hide();
                            //     $(this).dequeue();
                            // });
                        }
                    }

                }); // ajax clode
            }); // event close

        }); // jquery close


        // Address Form Submit

        $('#bussiness-address').on('submit', function(event) {
            // Ajax Header Setup
            $.ajaxSetup({
                // Token
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            event.preventDefault();
            // declarations
            let nationality = $('#nationality').val();
            let code = $('#code').val();
            let phone = $('#phone').val();
            let emirate = $('#emirate').val();
            let area = $('#area').val();
            let address = $('#address').val();

            //  Ajax post
            $.ajax({
                type: 'POST',
                url: "{{ route('business.step2') }}",
                data: {
                    nationality: nationality,
                    code: code,
                    phone: phone,
                    emirate: emirate,
                    area: area,
                    address: address
                },
                success: function(data) {
                    if (data.success) {
                        $.notify(data.success, {
                            type: "success",
                            align: "right",
                            verticalAlign: "bottom",
                            color: "#fff",
                            background: "#20D67B"
                        });
                        // $("#success .toast-body").text(data.success);
                        // $("#error .toast").hide();
                        // $("#success .toast").show().delay(5000).queue(function() {
                        //     $(this).hide();
                        //     $(this).dequeue();
                        // });
                        let curr = $('.nav-wizard .nav-link.active');
                        let next = $(curr).parent().next().find('a');
                        $(curr).removeClass('active');
                        $(curr).addClass('done');
                        $($(curr).attr('href')).removeClass('active');
                        $(next).addClass('active');
                        $($(next).attr('href')).addClass('active');

                    } else {
                        $.notify(data.error, {
                            type: "error",
                            color: "#fff",
                            align: "right",
                            verticalAlign: "bottom",
                            background: "#D44950",
                        });
                        // $("#error .toast-body").text(data.error);
                        // $("#success .toast").hide();
                        // $("#error .toast").show().delay(9000).queue(function() {
                        //     $(this).hide();
                        //     $(this).dequeue();
                        // });
                    }
                }

            }); // ajax clode



        }); // event close

        $('#bussiness-documents').on('submit', function(event) {
            // Ajax Header Setup
            $.ajaxSetup({
                // Token
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            event.preventDefault();
            // declarations
            let formData = new FormData(this);

            //  Ajax post
            $.ajax({
                type: 'POST',
                url: "{{ route('business.step3') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.success) {
                        $.notify(data.success, {
                            type: "success",
                            align: "right",
                            verticalAlign: "bottom",
                            color: "#fff",
                            background: "#20D67B"
                        });
                        // $("#success .toast-body").text(data.success);
                        // $("#error .toast").hide();
                        // $("#success .toast").show().delay(5000).queue(function() {
                        //     $(this).hide();
                        //     $(this).dequeue();
                        // });

                        let curr = $('.nav-wizard .nav-link.active');
                        let next = $(curr).parent().next().find('a');
                        $(curr).removeClass('active');
                        $(curr).addClass('done');
                        $($(curr).attr('href')).removeClass('active');
                        $(next).addClass('active');
                        $($(next).attr('href')).addClass('active');

                    } else {
                        $.notify(data.error, {
                            type: "error",
                            color: "#fff",
                            align: "right",
                            verticalAlign: "bottom",
                            background: "#D44950",
                        });
                        // $("#error .toast-body").text(data.error);
                        // $("#success .toast").hide();
                        // $("#error .toast").show().delay(9000).queue(function() {
                        //     $(this).hide();
                        //     $(this).dequeue();
                        // });
                    }
                }

            }); // ajax clode
        });
    </script>
</body>

</html>