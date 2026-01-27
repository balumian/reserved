@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-12 text-center mb-4">
                <div class="fs-1">Reserved</div>
                <h3 class="fs-2 fs-md-3">Business Package</h3>
                <!-- <div class="d-flex justify-content-center">
                    <label class="form-check-label me-2" for="customSwitch1">Monthly</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" id="customSwitch1" type="checkbox" checked="checked" />
                        <label class="form-check-label align-top" for="customSwitch1">Yearly</label>
                    </div>
                </div> -->
            </div>
            <div class="col-12 col-lg-9 col-xl-10 col-xxl-8">
                <div class="row justify-content-md-center">
                    <div class="col-md-6">
                        <div class="border rounded-3 overflow-hidden mb-3 mb-md-0">
                            <div class="text-center p-4">
                                <h3 class="fw-normal my-0">{{$package->title}}</h3>
                                <p class="mt-3">{{$package->description}}</p>
                                <h2 class="fw-medium my-4"> <sup class="fw-normal fs-2 me-1">AED</sup>@if($package->price){{$package->price}}@else 0 @endif<small class="fs--1 text-700">/ month</small>
                            </div>
                            <div class="p-4 bg-light">
                                <ul class="list-unstyled">
                                    <li class="border-bottom py-2"> <span class="fas fa-check text-primary" data-fa-transform="shrink-2"> </span> {{$package->reservations}} {{$package->reservations_label}}</li>
                                    <li class="border-bottom py-2"> <span class="fas fa-check text-primary" data-fa-transform="shrink-2"></span> {{$package->contacts}} {{$package->contacts_label}}</li>
                                </ul>
                                <!-- <button class="btn btn-outline-primary d-block w-100" type="button">Start free trial </button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-12 text-center">
                <h5 class="mt-5">Looking for personal or small team task management?</h5>
                <p class="fs-1">Try the <a href="#">basic version</a> of Falcon</p>
            </div> -->
        </div>
    </div>
</div>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop