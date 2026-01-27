@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h5 class="mb-2">
                    {{$customer->name}} (<a href="mailto:{{$customer->email}} ">{{$customer->email}} </a>)
                    @if(!$customer->banned)
                    <span class="badge rounded-pill badge-soft-success">Active</span>
                    @else
                    <span class="badge rounded-pill badge-soft-danger">Banned</span>
                    @endif
                </h5>
                <button class="btn btn-falcon-default btn-sm dropdown-toggle ms-2 dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                <div class="dropdown-menu"><a class="dropdown-item" href="/admin/edit/{{$customer->id}}/customer">Edit</a>
                    <!-- <a class="dropdown-item" href="#">Report</a><a class="dropdown-item" href="#">Archive</a> -->
                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="/admin/delete/{{$customer->id}}/customer">Delete user</a>
                </div>
            </div>
            <div class="col-auto d-none d-sm-block">
                <h6 class="text-uppercase text-600">User<span class="fas fa-user ms-2"></span></h6>
            </div>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
            <div class="flex-1">
                <p class="mb-0">User was created</p>
                <p class="fs--1 mb-0 text-600">{{format_date($customer->created_at,'M d, Y, h:i A')}}</p>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="mb-0">Account Information</h5>
            </div>
            <div class="col-auto">
                <a class="btn btn-falcon-default btn-sm" href="/admin/edit/{{$customer->id}}/customer"><span class="fas fa-pencil-alt fs--2 me-1"></span>Update details</a>
            </div>
        </div>
    </div>
    <div class="card-body bg-light border-top">
        @if($customer->profile && $customer->profile->avatar)
        <div class="row">
            <div class="col" style="height: 200px;">
                <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle" style="top: 0px;">
                    <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                        <img src="{{asset('storage/'.$customer->profile->avatar)}}" width="200" alt="" id="customer-pro-pic" />
                    </div>
                </div>
                <!-- <div class="bg-white dark__bg-1100 p-3 h-100">
                    <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{asset('storage/'.$customer->profile->avatar)}}" alt="" width="100">
                </div> -->
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg col-xxl-5">
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Full Name</p>
                    </div>
                    <div class="col">{{$customer->name}}</div>
                    <div class="border-bottom border-dashed my-3"></div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Created</p>
                    </div>
                    <div class="col">{{format_date($customer->created_at,'M d, Y, h:i A')}}</div>
                    <div class="border-bottom border-dashed my-3"></div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Email</p>
                    </div>
                    <div class="col">
                        <a href="mailto:$customer->email">{{$customer->email}}</a>
                        @if($customer->email_verified_at)
                        <span class="badge rounded-pill badge-soft-success">Verified</span>
                        @else
                        <span class="badge rounded-pill badge-soft-danger">Pending</span>
                        @endif
                    </div>
                    <div class="border-bottom border-dashed my-3"></div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Phone</p>
                    </div>
                    <div class="col">
                        @if($customer->profile && $customer->profile->phone)
                        <a href="tel:{{checkIsNull($customer->profile->code)}}{{checkIsNull($customer->profile->phone)}}">
                            ({{checkIsNull($customer->profile->code)}}) {{checkIsNull($customer->profile->phone)}}
                        </a>
                        @else
                        ---
                        @endif
                    </div>
                    <div class="border-bottom border-dashed my-3"></div>
                </div>
            </div>
            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Nationality</p>
                    </div>
                    <div class="col">
                        @if($customer->profile)
                        {{$customer->profile->country->name}}
                        @else
                        ---
                        @endif
                    </div>
                    <div class="border-bottom border-dashed my-3"></div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-1">Emirate</p>
                    </div>
                    <div class="col">
                        @if($customer->profile)
                        {{$customer->profile->emirates->name}}
                        @else
                        ---
                        @endif
                    </div>
                    <div class="border-bottom border-dashed my-3"></div>
                </div>
                <div class="row">
                    <div class="col-5 col-sm-4">
                        <p class="fw-semi-bold mb-0">Area</p>
                    </div>
                    <div class="col">
                        @if($customer->profile)
                        {{checkIsNull($customer->profile->areas->name)}}
                        @else
                        ---
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
                            @if($customer->profile)
                            {{checkIsNull($customer->profile->address)}}
                            @else
                            ---
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

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->

@stop