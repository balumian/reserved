@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->




<div class="card mb-3">
    <div class="card-header position-relative min-vh-25 mb-7">

        <div class="bg-holder rounded-3 rounded-bottom-0" @if(!empty($business->business->coverphoto)) style="background-image:url({{asset('storage/'.$business->business->coverphoto->path)}});" @else style="background-image:url({{asset('assets/images/placeholder.jpg')}});" @endif>
        </div>
        <!--/.bg-holder-->

        <div class="avatar avatar-5xl avatar-profile">
            @if(!empty($business->profile->avatar))
            <img class="rounded-circle img-thumbnail shadow-sm" src="{{asset('storage/'.$business->profile->avatar)}}" width="200" alt="" />
            @else
            <div class="avatar-name rounded-circle">
                <span>{{get_custom_avatar($business->business->name)}}</span>
            </div>
            @endif
            <!-- <img class="rounded-circle img-thumbnail shadow-sm" src="../../assets/img/team/2.jpg" width="200" alt="" /> -->
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <h4 class="mb-1"> {{$business->business->name}}
                    @if($business->business->status)
                    <span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                    @endif
                </h4>
                <h5 class="fs-0 fw-normal">{{$business->name}}</h5>
                <p class="text-500">{{get_emirate($business->profile->emirate)}}</p>
                <a class="btn btn-falcon-primary btn-sm px-3" href="/admin/businesses/{{$business->id}}/edit">Edit</a>
                <!-- <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button> -->
                <div class="border-bottom border-dashed my-4 d-lg-none"></div>
            </div>
            <div class="col ps-2 ps-lg-3">
                <a class="d-flex align-items-center mb-2" href="mailto:{{$business->email}}"><span class="fas fa-envelope fs-2 me-2 text-700" data-fa-transform="grow-2"></span>
                    <div class="flex-1">
                        <h6 class="mb-0">{{$business->email}}
                            @if($business->email_verified_at)
                            <span class="badge badge-soft-success">Verified</span>
                            @else
                            <span class="badge badge-soft-danger">Unverified</span>
                            @endif
                        </h6>
                    </div>
                </a>
                <a class="d-flex align-items-center mb-2" href="tel:{{checkIsNull($business->profile->code)}}{{checkIsNull($business->profile->phone)}}"><span class="fas fa-phone-alt fs-1 me-2 text-700" data-fa-transform="grow-2"></span>
                    <div class="flex-1">
                        <h6 class="mb-0">({{checkIsNull($business->profile->code)}}) {{checkIsNull($business->profile->phone)}}</h6>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Account Information -->
<div class="row g-0">
    <div class="col-lg-8 pe-lg-2">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0">Account Information</h5>
                    </div>
                    <!-- <div class="col-auto">
                <a class="btn btn-falcon-default btn-sm" href="/admin/edit/{{$business->id}}/business"><span class="fas fa-pencil-alt fs--2 me-1"></span>Update details</a>
            </div> -->
                </div>
            </div>
            <div class="card-body bg-light border-top">
                <div class="row">
                    <div class="col-lg-12 col-xxl-12">
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Full Name</p>
                            </div>
                            <div class="col">{{$business->name}}</div>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Nationality</p>
                            </div>
                            <div class="col">
                                @if($business->profile)
                                {{get_nationalities($business->profile->nationality)}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Created</p>
                            </div>
                            <div class="col">{{format_date($business->created_at,'M d, Y, h:i A')}}</div>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xxl-12">

                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Emirate</p>
                            </div>
                            <div class="col">
                                @if($business->profile)
                                {{get_emirate($business->profile->emirate)}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-0">Area</p>
                            </div>
                            <div class="col">
                                @if($business->profile)
                                {{get_area($business->profile->area)}}
                                @else
                                -
                                @endif
                            </div>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Address</p>
                            </div>
                            <div class="col">
                                <p class="mb-1">
                                    @if($business->profile)
                                    {{checkIsNull($business->profile->address)}}
                                    @else
                                    -
                                    @endif
                                </p>
                            </div>
                            <div class="border-bottom border-dashed my-3"></div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer border-top">

                <!-- <a class="btn btn-falcon-default btn-sm" href=""><span class="fas fa-dollar-sign fs--2 me-1"></span>Save</a> -->

                <!-- <a class="btn btn-falcon-default btn-sm ms-2"
            href="#!"><span class="fas fa-check fs--2 me-1"></span>Save changes</a> -->
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-light d-flex justify-content-between">
                <h5 class="mb-0">Business</h5>
            </div>
            <div class="card-body fs--1 pb-0">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="{{asset('storage/'.$business->business->residence_front)}}" alt="" width="50" />
                            <div class="flex-1">
                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="{{asset('storage/'.$business->business->residence_front)}}" data-gallery="documents">Residence ID (Front)</a></h6>
                                <!-- <p class="mb-1">3243 associates</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="{{asset('storage/'.$business->business->residence_back)}}" alt="" width="50" />
                            <div class="flex-1">
                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="{{asset('storage/'.$business->business->residence_back)}}" data-gallery="documents">Residence ID (Back)</a></h6>
                                <!-- <p class="mb-1">34598 associates</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="{{asset('storage/'.$business->business->passport)}}" alt="" width="50" />
                            <div class="flex-1">
                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="{{asset('storage/'.$business->business->passport)}}" data-gallery="documents">Passport</a></h6>
                                <!-- <p class="mb-1">7652 associates</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="d-flex position-relative align-items-center mb-2"><img class="d-flex align-self-center me-2 rounded-3" src="{{asset('storage/'.$business->business->trade_license)}}" alt="" width="50" />
                            <div class="flex-1">
                                <h6 class="fs-0 mb-0"><a class="stretched-link" href="{{asset('storage/'.$business->business->trade_license)}}" data-gallery="documents">Trade License</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="row">
                            <div class="border-top border-dashed m-3"></div>
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">Tax No.</p>
                            </div>
                            <div class="col">{{$business->business->vat}}</div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="row">
                            <div class="border-top border-dashed my-3"></div>
                            <div class="col-5 col-sm-4">
                                <p class="fw-semi-bold mb-1">License No.</p>
                            </div>
                            <div class="col">{{$business->business->license}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 ps-lg-2">
        <div class="sticky-sidebar">
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
                                    <h2 class="fw-medium my-4"> <sup class="fw-normal fs-2 me-1">AED</sup>
                                        @if($package->custom)
                                        @if($package->price){{$package->price}}@else 0 @endif<small class="fs--1 text-700">/ month</small>
                                        @else
                                        @if($package->businesspackage->price){{$package->businesspackage->price}}@else 0 @endif<small class="fs--1 text-700">/ month</small>
                                        @endif
                                </div>
                                <div class="p-4 bg-light">
                                    <ul class="list-unstyled">
                                        <li class="border-bottom py-2"> <span class="fas fa-check text-primary" data-fa-transform="shrink-2"> </span> {{$package->reservations}} {{$package->businesspackage->reservations_label}}</li>
                                        <li class="border-bottom py-2"> <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> {{$package->contacts}} {{$package->businesspackage->contacts_label}}</li>
                                    </ul>
                                    <!-- <button class="btn btn-outline-primary d-block w-100" type="button">Start free trial </button> -->
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


<!-- Documents -->



<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop