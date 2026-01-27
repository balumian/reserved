@extends('business.layouts.app')
@section('css')
<link href="{{asset('admin/vendors/choices/choices.min.css')}}" rel="stylesheet" />
@stop
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
                            <input class="d-none" id="upload-cover-image" type="file" name="cover_photo" id="cover_photo" onchange="changeCover(this);" accept=".png,.jpg,.jpeg" />
                        </form>
                        <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
                    </div>
                    <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                            @if(!empty($business->profile->avatar))
                            <img class="avatar" src="{{asset('storage/'.$business->profile->avatar)}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                            @else
                            <img class="avatar" src="{{asset('assets/images/rest-logo.jpg')}}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                            @endif
                            <form id="avatar-photo-form">
                                <input class="d-none" id="profile-image" type="file" name="avatar" onchange="changeAvatar(this);" accept=".png,.jpg,.jpeg" />
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
            <!-- Business Documents -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Business</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{route('business.documents.update')}}" id="business-documents" method="post" enctype="multipart/form-data">
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
                                    <input class="form-control" value="{{$business->business->license}}" placeholder="XXXX" name="license" type="text" id="license" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="vat">Vat No</label>
                                    <input class="form-control" value="{{$business->business->vat}}" placeholder="TRX" name="vat" type="text" id="vat" />
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">Save </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Business Bio -->
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Bio</h5>
                </div>
                <div class="card-body bg-light">
                    <form action="{{route('business.bio.update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="min-vh-50">
                                    <label class="form-label" for="description">Description (EN) </label>
                                    <textarea class="tinymce d-none" name="description">{{$business->business->overview}}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="min-vh-50 right-text">
                                    <label class="form-label" for="description_ar">(AR) وصف</label>
                                    <textarea class="tinymce d-none" name="description_ar">{{getAttributeTranslated($business->business,'overview')}}</textarea>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit">Save </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 ps-lg-2">
            <div class="">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Reservation Settings</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{route('business.settings.update')}}" method="post" id="business-setup-setting">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="type">Business Type <span class="text-danger">*</span></label>
                                <select class="form-select" name="type" id="type" required>
                                    <option value="">Select business type ...</option>
                                    @foreach($types as $key => $type)
                                    <option value="{{$key}}" @if($business->business->business_type_id == $key) selected @endif>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="reservation_type">Reservation Type <span class="text-danger">*</span></label>
                                <select class="form-select" name="reservation_type" id="reservation_type" required>
                                    <option value="">Select reservation type ...</option>
                                    @foreach(reservation_types() as $key => $type)
                                    <option value="{{$key}}" @if($business->business->reservation_type == $key) selected @endif>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="capacity">Capacity <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$business->business->capacity}}" name="capacity" type="text" id="capacity" />
                                <span class="fs--2">No. of tables or persons</span>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Save </button>
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
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
                                            <label class="form-check-label" for="customize">Change Package</label>
                                        </div>
                                        <div class="border-top py-2" id="customized-package" style="display: none;">
                                            <form action="{{route('business.package.change.request')}}" method="post">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label" for="package">Business Package </label>
                                                    <select class="form-select" name="package" id="package" onchange="handlePackageChange(this);">
                                                        <option value="">Select package ...</option>
                                                        @foreach(get_packages() as $key => $package)
                                                        <option value="{{$package->id}}">{{$package->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="reservations">Reservations <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="reservations" type="text" name="reservations" placeholder="No. of Reservations" required />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="contacts">Contacts <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="contacts" name="contacts" type="text" placeholder="No. of Contacts" required />
                                                </div>
                                                <button class="btn btn-primary d-block w-100" type="submit">Send Request </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @else
                        <form action="{{route('business.package.select')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="package">Business Package </label>
                                <select class="form-select" name="package" id="package">
                                    <option value="">Select package ...</option>
                                    @foreach(get_packages() as $key => $package)
                                    <option value="{{$package->id}}">{{$package->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Save </button>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Business Settings</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form action="{{route('business.update.details')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="price">Price </label>
                                <select class="form-select" name="price" id="price">
                                    <option value="">Select price ...</option>
                                    @foreach(get_prices() as $key => $type)
                                    <option value="{{$key}}" @if($business->business->businesssettings && $business->business->businesssettings->price_id == $key) selected @endif>{{$type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="cuisine">Cuisines</label>
                                <select class="form-select js-choice" id="cuisine" multiple="multiple" size="1" name="cuisine[]" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Select cuisine...</option>
                                    @foreach(get_cuisines() as $key => $val)
                                    <option value="{{$key}}" @if($business->business->businesssettings) {{spec_business_settings($business->business->businesssettings->cuisine,$key)}} @endif>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="themes">Themes</label>
                                <select class="form-select js-choice" id="themes" multiple="multiple" size="1" name="themes[]" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Select themes...</option>
                                    @foreach(get_themes() as $key => $val)
                                    <option value="{{$key}}" @if($business->business->businesssettings) {{spec_business_settings($business->business->businesssettings->themes,$key)}} @endif>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="amenities">Amenities</label>
                                <select class="form-select js-choice" id="amenities" multiple="multiple" size="1" name="amenities[]" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Select amenities...</option>
                                    @foreach(get_amenities() as $key => $val)
                                    <option value="{{$key}}" @if($business->business->businesssettings) {{spec_business_settings($business->business->businesssettings->amenities,$key)}} @endif>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="experiences">Experiences</label>
                                <select class="form-select js-choice" id="experiences" multiple="multiple" size="1" name="experiences[]" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Select experiences...</option>
                                    @foreach(get_experiences() as $key => $val)
                                    <option value="{{$key}}" @if($business->business->businesssettings) {{spec_business_settings($business->business->businesssettings->experiences,$key)}} @endif>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="features">Special Features</label>
                                <select class="form-select js-choice" id="features" multiple="multiple" size="1" name="features[]" data-options='{"removeItemButton":true,"placeholder":true}'>
                                    <option value="">Select features...</option>
                                    @foreach(get_features() as $key => $val)
                                    <option value="{{$key}}" @if($business->business->businesssettings) {{spec_business_settings($business->business->businesssettings->features,$key)}} @endif>{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="user" value="{{$business->id}}">
                            <button class="btn btn-primary d-block w-100" type="submit">Save </button>
                        </form>
                    </div>
                </div>

                <!-- <div class="card mb-3 overflow-hidden">
                    <div class="card-header">
                        <h5 class="mb-0">Gallery</h5>
                    </div>
                    <div class="card-body bg-light">

                        <div class="row">
                            <div class="col-lg-12">
                                <form class="dropzone dropzone-multiple p-0" id="my-awesome-dropzone" data-dropzone="data-dropzone" action="#!">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple" />
                                    </div>
                                    <div class="dz-message" data-dz-message="data-dz-message"> <img class="me-2" src="{{asset('admin/assets/img/icons/cloud-upload.svg')}}" width="25" alt="" />Drop your files here</div>
                                    <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                                        <div class="d-flex media mb-3 pb-3 border-bottom btn-reveal-trigger"><img class="dz-image" src="{{asset('assets/img/generic/image-file-2.png')}}" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                                            <div class="flex-1 d-flex flex-between-center">
                                                <div>
                                                    <h6 data-dz-name="data-dz-name"></h6>
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0 fs--1 text-400 lh-1" data-dz-size="data-dz-size"></p>
                                                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                                    </div><span class="fs--2 text-danger" data-dz-errormessage="data-dz-errormessage"></span>
                                                </div>
                                                <div class="dropdown font-sans-serif">
                                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
    @include('admin.partials.jquery')
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <script src="{{asset('admin/vendors/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('admin/vendors/choices/choices.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('admin/vendors/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript">
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
                    url: "{{ route('business.cover.update') }}",
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

        // Avatar Change 

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
                    url: "{{ route('business.avatar.update') }}",
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

        // Change Business Package 

        function handlePackageChange(input) {
            var packageID = $(input).val();
            // Ajax Header Setup
            $.ajaxSetup({
                // Token
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('business.get.package') }}",
                data: {
                    package_id: packageID
                },
                success: function(data) {
                    if (data.package) {
                        if (data.package.reservations) {
                            $('#reservations').val(data.package.reservations);
                        }
                        if (data.package.contacts) {
                            $('#contacts').val(data.package.contacts);
                        }
                    }
                }
            })

        }
    </script>

    @stop