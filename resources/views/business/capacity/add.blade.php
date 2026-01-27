@extends('business.layouts.app')
@section('css')
<link href="{{asset('admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet" />
@stop
@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Add New Capacity</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('business.capacity.store')}}" method="post">

                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="capacity">Capacity (EN) <span class="text-danger">*</span></label>
                                        <input class="form-control" name="capacity" id="capacity" type="text" placeholder="Capacity in English" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 right-text">
                                        <label class="form-label" for="close"><span class="text-danger">*</span> (AR) سعة</label>
                                        <input class="form-control right-text" name="capacity_ar" id="capacity_ar" type="text" placeholder="سعة في اللغة العربية" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" id="description" rows="3"></textarea>
                                    </div>
                                    <h6 class="text-danger">{{$errors->first('description')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="status" type="checkbox" checked="" name="status" id="status" />
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


 

@stop