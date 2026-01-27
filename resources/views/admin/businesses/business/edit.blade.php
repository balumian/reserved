@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="row">
    <div class="col-12">
        <div class="card mb-3 btn-reveal-trigger">
            <div class="card-header position-relative min-vh-25 mb-8">
                <div class="cover-image">
                    @if(!empty($business->business->coverphoto))
                    <div class="bg-holder rounded-3 rounded-bottom-0 cover" style="background-image:url({{asset('storage/'.$business->business->coverphoto->path)}});">
                        @else
                        <div class="bg-holder rounded-3 rounded-bottom-0 cover" style="background-image:url({{asset('assets/images/placeholder.jpg')}});">
                            @endif
                        </div>
                        <!--/.bg-holder-->
                        <form id="cover-photo-form">
                            <input type="hidden" name="user" id="user" value="{{$business->id}}">
                            <input class="d-none" id="upload-cover-image" type="file" name="cover_photo" id="cover_photo" onchange="changeCover(this);" accept=".png,.jpg,.jpeg" />
                        </form>
                        <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
                    </div>
                    <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                            @if(!empty($business->profile->avatar))
                            <img class="avatar" src="{{asset('storage/'.$business->profile->avatar)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                            @else
                            <img class="avatar" src="{{asset('assets/images/profile.png')}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                            @endif
                            <form id="avatar-photo-form">
                                <input type="hidden" name="user" id="user" value="{{$business->id}}">
                                <input class="d-none" id="profile-image" type="file" name="avatar" onchange="changeAvatar(this);" accept=".png,.jpg,.jpeg," />
                            </form>
                            <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-8 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Profile Settings</h5>
                </div>
                <div class="card-body bg-light">
                    <form class="row g-3" action="{{route('admin.business.profile.update')}}" id="admin-business-profile" method="post">
                        <input type="hidden" name="data_id" value="{{$business->id}}">
                        @csrf
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-name">Full Name <span class="text-danger">*</span></label>
                            <input class="form-control" id="basic-form-name" type="text" value="{{$business->name}}" name="name" id="name" placeholder="Full Name" required />
                            <h6 class="text-danger">{{$errors->first('name')}}</h6>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-email">Email <span class="text-danger">*</span></label>
                            <input class="form-control" id="basic-form-email" value="{{$business->email}}" type="email" placeholder="name@example.com" name="email" id="email" required />
                            <h6 class="text-danger">{{$errors->first('email')}}</h6>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-phone">Phone </label>
                            <div class="input-group mb-3">
                                <select class="form-select mb-3" name="code" id="code" style="max-width: 120px;">
                                    @foreach(get_dialing_code() as $code)
                                    <option value="{{$code}}" @if($code==$business->profile->code ) selected @endif>{{$code}}</option>
                                    @endforeach
                                </select>
                                <input class="form-control mb-3" id="basic-form-phone" value="{{checkIsNull($business->profile) ? $business->profile->phone : '' }}" type="text" placeholder="501122333" name="phone" id="phone" />
                                <h6 class="text-danger">{{$errors->first('phone')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-nationality">Nationality </label>
                            <select class="form-select mb-3" name="nationality" id="nationality">
                                <option value="">Select your nationality ...</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}" @if($country->id == $business->profile->nationality ) selected @endif>{{$country->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-emirate">Emirate </label>
                            <select class="form-select mb-3" name="emirate" id="emirate" onchange="get_areas(this);">
                                <option value="">Select emirates ...</option>
                                @foreach($emirates as $emirate)
                                <option value="{{$emirate->id}}" @if($emirate->id == $business->profile->emirate ) selected @endif>{{$emirate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-area">Area </label>
                            <select class="form-select mb-3" name="area" id="area">
                                <option value="">Select area ...</option>
                                @if($business->profile)
                                @foreach(get_area_by_emirate($business->profile->emirate) as $area)
                                <option value="{{$area->id}}" @if($area->id == $business->profile->area ) selected @endif>{{$area->name}} </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="address">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{$business->profile->address}}</textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Update </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Business Documents -->

            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Business Documents</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{route('admin.business.documents.update')}}" id="admin-business-documents" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="business" value="{{$business->id}}">
                        @csrf
                        <div class="row g-2">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Business Name (EN) <span class="text-danger">*</span></label>
                                    <input class="form-control" placeholder="Restaurant Name" value="{{$business->business->name}}" name="name" type="text" id="name" required />
                                </div>
                            </div>
                            <div class="col-lg-6 right-text">
                                <div class="mb-3">
                                    <label class="form-label" for="name_ar"><span class="text-danger">*</span> (AR) اسم تجاري</label>
                                    <input class="form-control right-text" value="{{getAttributeTranslated($business->business,'name')}}" placeholder="اسم تجاري" name="name_ar" type="text" id="name_ar" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Residence ID (Front)</label>
                                    <input class="form-control form-control-sm" id="residence_front" name="residence_front" type="file" accept=".gif, .jpg, .png, .pdf">
                                    @if($business->business->residence_front)
                                    <a href="{{asset('storage/'.$business->business->residence_front)}}" data-gallery="documents"><span>Residence ID (Front)</span></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Residence ID (Back)</label>
                                    <input class="form-control form-control-sm" id="residence_back" name="residence_back" type="file" accept=".gif, .jpg, .png, .pdf">
                                    @if($business->business->residence_back)
                                    <a href="{{asset('storage/'.$business->business->residence_back)}}" data-gallery="documents"><span>Residence ID (Back)</span></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Passport</label>
                                    <input class="form-control form-control-sm" id="passport" name="passport" type="file" accept=".gif, .jpg, .png, .pdf">
                                    @if($business->business->passport)
                                    <a href="{{asset('storage/'.$business->business->passport)}}" data-gallery="documents"><span>Passport</span></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">Trade Licence</label>
                                    <input class="form-control form-control-sm" id="trade_license" name="trade_license" accept=".gif, .jpg, .png, .pdf" type="file">
                                    @if($business->business->trade_license)
                                    <a href="{{asset('storage/'.$business->business->trade_license)}}" data-gallery="documents"><span>Trade License</span></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="license">License No</label>
                                    <input class="form-control" value="{{$business->business->license}}" placeholder="xxxx" name="license" type="text" id="license" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="vat">Vat No</label>
                                    <input class="form-control" value="{{$business->business->vat}}" placeholder="TRN" name="vat" type="text" id="vat" />
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">Update </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4 ps-lg-2">
            <div class="">
                <div class="card mb-3 overflow-hidden">
                    <div class="card-header">
                        <h5 class="mb-0">Account Settings</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="form-check form-switch mb-1 lh-1">
                            <form id="account-status">
                                <input type="hidden" name="user" value="{{$business->id}}">
                                <input class="form-check-input" onchange="accountStatusUpdate(this);" type="checkbox" id="status" name="status" @if($business->status) checked @endif />
                                <label class="form-check-label mb-0" for="banned">Account Status
                                </label>
                            </form>
                        </div>
                        <div class="form-check form-switch mb-1 lh-1">
                            <form id="business-status">
                                <input type="hidden" name="user" value="{{$business->id}}">
                                <input class="form-check-input" type="checkbox" onchange="businessStatusUpdate(this);" id="status" name="status" @if($business->business->status) checked @endif />
                                <label class="form-check-label mb-0" for="status">Business Status
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Change Password</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{route('admin.business.password.update')}}" method="post" id="business-password-update">
                            @csrf
                            <input type="hidden" name="user" value="{{$business->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="password">New Password <span class="text-danger">*</span></label>
                                <input class="form-control" id="password" type="password" name="password" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" />
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Update Password </button>
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Change Package</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{route('admin.business.package.change')}}" method="post">
                            @csrf
                            <input type="hidden" name="user" value="{{$business->id}}">
                            <div class="mb-3">
                                <label class="form-label" for="package">Business Package <span class="text-danger">*</span></label>
                                <select class="form-select" name="package" id="package" required>
                                    <option value="">Select business package...</option>
                                    @foreach(packages() as $pack)
                                    <option value="{{$pack->id}}" @if($business->business->activepackage && $business->business->activepackage->package_id == $pack->id ) selected @endif>{{$pack->title}} ( price -
                                        @if($pack->price){{$pack->price}}@else 0 @endif) </option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Update Package</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Business Package</h5>
                    </div>
                    <div class="card-body fs--1">
                        @if(!is_null($package))
                        <div class="row justify-content-md-center">
                            <div class="col-md-12">
                                <div class="border rounded-3 overflow-hidden mb-3 mb-md-0">
                                    <div class="text-center p-4">
                                        <h3 class="fw-normal my-0">{{$package->businesspackage->title}} @if($package->custom) / Customized @endif</h3>
                                        <p class="mt-3">{{$package->businesspackage->description}}</p>
                                        <h2 class="fw-medium my-4"> <sup class="fw-normal fs-2 me-1">AED</sup>@if($package->price){{$package->price}}@else 0 @endif<small class="fs--1 text-700">/ month</small>
                                    </div>
                                    <div class="p-4 bg-light">
                                        <ul class="list-unstyled">
                                            <li class="border-bottom py-2"> <span class="fas fa-check text-primary" data-fa-transform="shrink-2"> </span> {{$package->reservations}} {{$package->businesspackage->reservations_label}}</li>
                                            <li class="border-bottom py-2"> <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> {{$package->contacts}} {{$package->businesspackage->contacts_label}}</li>
                                        </ul>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" id="customize" type="checkbox" onchange="handleCustomized(this);" />
                                            <label class="form-check-label" for="customize">Customized</label>
                                        </div>
                                        <div class="border-top py-2" id="customized-package" style="display: none;">
                                            <form action="{{route('admin.business.custom.package')}}" method="post">
                                                <input type="hidden" name="data_id" value="{{$business->business->id}}">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label" for="reservations">Reservations <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="reservations" type="text" name="reservations" placeholder="No. of Reservations" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="contacts">Contacts <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="contacts" name="contacts" type="text" placeholder="No. of Contacts" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="price">Price <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="price" name="price" type="text" placeholder="Updated Price" required />
                                                </div>
                                                <button class="btn btn-primary d-block w-100" type="submit">Update Package </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@include('admin.partials.jquery')
<script type="text/javascript" src="{{asset('admin/vendors/jquery/jquery.min.js')}}"></script>
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

    function handleCustomized(input) {
        if ($(input).is(':checked')) {
            $("#customized-package").show(500);
        } else {
            $("#customized-package").hide(500);
        }
    }

    function changeCover(input) {
        if (input.files && input.files[0]) {
            // Ajax Header Setup
            $.ajaxSetup({
                // Token
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let form = document.getElementById("cover-photo-form");
            let formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.business.cover.update') }}",
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
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.cover')
                                .css('background-image', "url(" + e.target.result + ")")
                        };
                        reader.readAsDataURL(input.files[0]);
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
            })
        }
    }

    function changeAvatar(input) {
        if (input.files && input.files[0]) {
            // Ajax Header Setup
            $.ajaxSetup({
                // Token
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let form = document.getElementById("avatar-photo-form");
            let formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.business.avatar.update') }}",
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
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('.avatar')
                                .attr('src', e.target.result)
                        };
                        reader.readAsDataURL(input.files[0]);
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
            })
        }
    }

    function accountStatusUpdate() {
        // Ajax Header Setup
        $.ajaxSetup({
            // Token
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = document.getElementById("account-status");
        let formData = new FormData(form);
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.account.status.update') }}",
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
        })
    }

    function businessStatusUpdate() {
        // Ajax Header Setup
        $.ajaxSetup({
            // Token
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let form = document.getElementById("business-status");
        let formData = new FormData(form);
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.business.status.update') }}",
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
        })
    }
</script>


@stop