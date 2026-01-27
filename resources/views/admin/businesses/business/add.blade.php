@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Add New Business</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="theme-wizard mb-5">
                    <div class="bg-light pt-3 pb-2">
                        <ul class="nav justify-content-between nav-wizard">
                            <li class="nav-item"><a style="pointer-events: none;" class="nav-link active fw-semi-bold" href="#bootstrap-wizard-tab1" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-lock"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Account</span></a></li>
                            <li class="nav-item"><a style="pointer-events: none;" class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab2" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-location-arrow"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Address</span></a></li>
                            <li class="nav-item"><a style="pointer-events: none;" class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab3" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-briefcase"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Business</span></a></li>
                            <li class="nav-item"><a style="pointer-events: none;" class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab4" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-thumbs-up"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Done</span></a></li>
                        </ul>
                    </div>
                    <div class="py-4">
                        <div class="tab-content">
                            <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">
                                <form id="bussiness-wizard-account">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="bootstrap-wizard-wizard-name">Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text" id="name" name="name" placeholder="John Smith" id="bootstrap-wizard-wizard-name" required />
                                                <h6 class="text-danger">{{$errors->first('name')}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="bootstrap-wizard-wizard-email">Email
                                                    <span class="text-danger">*</span></label>
                                                <input class="form-control" type="email" id="email" name="email" placeholder="Email address" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" id="bootstrap-wizard-wizard-email" data-wizard-validate-email="true" />
                                                <h6 class="text-danger">{{$errors->first('email')}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check form-switch" id="autopassword">
                                                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name="autopassword" />
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Auto
                                                    generate
                                                    password</label>
                                            </div>
                                        </div>
                                        <div class="col-6 customer-password">
                                            <div class="mb-3">
                                                <label class="form-label" for="bootstrap-wizard-wizard-password">Password <span class="text-danger">*</span></label>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Password" id="bootstrap-wizard-wizard-password" data-wizard-validate-password="true" />
                                                <h6 class="text-danger">{{$errors->first('password')}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-6 customer-password">
                                            <div class="mb-3">
                                                <label class="form-label" for="bootstrap-wizard-wizard-confirm-password">Confirm Password
                                                    <span class="text-danger">*</span></label>
                                                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" id="bootstrap-wizard-wizard-confirm-password" data-wizard-validate-confirm-password="true" />
                                                <h6 class="text-danger">{{$errors->first('password_confirmation')}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-12 right-text mt-3">
                                            <button class="btn btn-primary px-5 px-sm-6" type="submit" id="step-one">Next<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab2" id="bootstrap-wizard-tab2">
                                <form id="bussiness-wizard-address">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="nationality">Nationality <span class="text-danger">*</span></label>
                                                <select class="form-select" name="nationality" id="nationality">
                                                    <option value="">Select your nationality ...</option>
                                                    @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}} </option>
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
                                                <h6 class="text-danger">{{$errors->first('phone')}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="emirate">Emirates <span class="text-danger">*</span></label>
                                                <select class="form-select" name="emirate" id="emirate" onchange="get_areas(this);">
                                                    <option value="">Select emirates ...</option>
                                                    @foreach($emirates as $emirate)
                                                    <option value="{{$emirate->id}}">{{$emirate->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="area">Area <span class="text-danger">*</span></label>
                                                <select class="form-select" name="area" id="area">
                                                    <option value="">Select area ...</option>
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
                                <form id="bussiness-wizard-documents">
                                    <div class="row g-2">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Business Name (EN) <span class="text-danger">*</span></label>
                                                <input class="form-control" placeholder="Restaurant Name" name="name" type="text" id="name" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 right-text">
                                            <div class="mb-3">
                                                <label class="form-label" for="name_ar"><span class="text-danger">*</span> (AR) اسم تجاري</label>
                                                <input class="form-control right-text" placeholder="اسم تجاري" name="name_ar" type="text" id="name_ar" required />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Residence ID (Front) <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-sm" id="residence_front" name="residence_front" type="file" accept=".gif, .jpg, .png, .pdf" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Residence ID (Back) <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-sm" id="residence_back" name="residence_back" type="file" accept=".gif, .jpg, .png, .pdf" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Passport <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-sm" id="passport" name="passport" type="file" accept=".gif, .jpg, .png, .pdf" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="formFileSm" class="form-label">Trade Licence <span class="text-danger">*</span></label>
                                                <input class="form-control form-control-sm" id="trade_license" name="trade_license" accept=".gif, .jpg, .png, .pdf" type="file" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="license">License No</label>
                                                <input class="form-control" placeholder="1234" name="license" type="text" id="license" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="vat">Vat No</label>
                                                <input class="form-control" placeholder="1234" name="vat" type="text" id="vat" />
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="package">Business Package <span class="text-danger">*</span></label>
                                                <select class="form-select" name="package" id="package" required>
                                                    @foreach($packages as $package)
                                                    <option value="{{$package->id}}">{{$package->title}} ( price -
                                                        @if($package->price){{$package->price}}@else 0 @endif) </option>
                                                    @endforeach
                                                </select>
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
                                <form method="post" action="{{route('admin.business.step4')}}">
                                    @csrf
                                    <div class="row g-2">
                                        <div class="col-lg-12 text-left">
                                            <div class="mb-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" name="accountverify" id="accountverify" />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Verify
                                                        Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-left">
                                            <div class="mb-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" name="businessverify" id="businessverify" />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Verify
                                                        Business</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-left">
                                            <div class="mb-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" name="sendaccount" id="sendaccount" />
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">Send
                                                        account information to user (Email)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="wizard-lottie-wrapper pb-5">
                                            <div class="lottie wizard-lottie mx-auto my-1" data-options='{"path":"../../assets/img/animated-icons/celebration.json"}'>
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

<script type="text/javascript" src="{{asset('admin/vendors/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
    // get Areas 

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
        $('#bussiness-wizard-account').on('submit', function(event) {
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
                url: "{{ route('admin.business.step1') }}",
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
                    }
                }

            }); // ajax clode
        }); // event close

    }); // jquery close


    // Address Form Submit

    $('#bussiness-wizard-address').on('submit', function(event) {
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
            url: "{{ route('admin.business.step2') }}",
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
                }
            }

        }); // ajax clode



    }); // event close

    $('#bussiness-wizard-documents').on('submit', function(event) {
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
            url: "{{ route('admin.business.step3') }}",
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
                     
                }
            }

        }); // ajax clode
    });
</script>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop