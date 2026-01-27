@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header position-relative min-vh-30 mb-2">
        @if(!empty($attraction->media))
        <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{asset('storage/'.$attraction->media->path)}});">
            @else
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{asset('assets/images/placeholder.jpg')}});">
                @endif
            </div>
            <!--/.bg-holder-->
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1"> {{$attraction->title}} ({{getAttributeTranslated($attraction,'title')}})
                        @if($attraction->status)
                        <span data-bs-toggle="tooltip" data-bs-placement="right" title="Active"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                        @endif
                    </h4>
                    <h5 class="fs-0 fw-normal">{{$attraction->stitle}} ({{getAttributeTranslated($attraction,'stitle')}})</h5>
                    <div class="border-bottom border-dashed my-4 d-lg-none"></div>
                </div>
                <div class="col ps-2 ps-lg-3"><a class="d-flex align-items-center mb-2" href="tel:{{$attraction->code}}{{$attraction->phone}}"><span class="fas fa-phone-square-alt fs-1 me-2 text-700" data-fa-transform="grow-2"></span>
                        <div class="flex-1">
                            <h6 class="mb-0 fs-1">({{$attraction->code}}) {{$attraction->phone}}</h6>
                        </div>
                    </a><a style="pointer-events: none;" class="d-flex align-items-center mb-2" href="#"><span class="fs-1 me-2 text-700" data-fa-transform="grow-2">AED</span>
                        <div class="flex-1">
                            <h6 class="mb-0 fs-1">{{$attraction->price}} </h6>
                        </div>
                    </a></div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-8 pe-lg-2">
            <!-- Description English -->
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Description (EN)</h5>
                </div>
                <div class="card-body text-justify">
                    {!!$attraction->description!!}
                    <!-- <div class="collapse show" id="description-en">
                    {!!$attraction->description!!}
                     <p class="mt-3 text-1000">I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. </p>
                    <p class="text-1000">It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face.</p>
                    <p class="text-1000 mb-0">There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</p>  
                </div> -->
                </div>
                <!-- <div class="card-footer bg-light p-0 border-top">
                <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#description-en" aria-expanded="true" aria-controls="description-en">Show <span class="less">less<span class="fas fa-chevron-up ms-2 fs--2"></span></span><span class="full">full<span class="fas fa-chevron-down ms-2 fs--2"></span></span></button>
            </div> -->
            </div>
            <!-- Description Arabic -->
            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Description (AR)</h5>
                </div>
                <div class="card-body text-justify">
                    {!! getAttributeTranslated($attraction,'description')!!}
                    <!-- <div class="collapse show" id="description-ar">
                    <p class="mt-3 text-1000">I’ve acquired a wide depth of knowledge and expertise in using my technical skills in programming, computer science, software development, and mobile app development to developing solutions to help organizations increase productivity, and accelerate business performance. </p>
                    <p class="text-1000">It’s great that we live in an age where we can share so much with technology but I’m but I’m ready for the next phase of my career, with a healthy balance between the virtual world and a workplace where I help others face-to-face.</p>
                    <p class="text-1000 mb-0">There’s always something new to learn, especially in IT-related fields. People like working with me because I can explain technology to everyone, from staff to executives who need me to tie together the details and the big picture. I can also implement the technologies that successful projects need.</p>
                </div> -->
                </div>
                <!-- <div class="card-footer bg-light p-0 border-top">
                <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#description-ar" aria-expanded="true" aria-controls="description-ar">Show <span class="less">less<span class="fas fa-chevron-up ms-2 fs--2"></span></span><span class="full">full<span class="fas fa-chevron-down ms-2 fs--2"></span></span></button>
            </div> -->
            </div>

        </div>

        <div class="col-lg-4 ps-lg-2">
            <div class="sticky-sidebar">
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Location Details</h5>
                    </div>
                    <div class="card-body fs--1">
                        <div class="d-flex">
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0">Emirates</h6>
                                <p class="text-1000 mb-0">{{get_emirates($attraction->emirates_id)}}</p>
                                <div class="border-bottom border-dashed my-3"></div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="flex-1 position-relative ps-3">
                                <h6 class="fs-0 mb-0">Area</h6>
                                <p class="text-1000 mb-0">{{get_area($attraction->areas_id)}}</p>
                                <div class="border-bottom border-dashed my-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 mb-lg-0">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Photos</h5>
                    </div>
                    <div class="card-body overflow-hidden">
                        <div class="row g-0">
                            @if($attraction->gallery)
                                @foreach(json_decode($attraction->gallery) as $photo)
                                <div class="col-6 p-1"><a class="glightbox" href="{{asset('storage/'.$photo)}}" data-gallery="gallery1" data-glightbox="data-glightbox"><img class="img-fluid rounded" src="{{asset('storage/'.$photo)}}" alt="..." /></a></div>
                                @endforeach
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
    @stop