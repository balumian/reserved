@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Update Area</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('admin.areas.update')}}" method="post">
                    <input type="hidden" name="data_id" value="{{$area->id}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                                <label class="form-label" for="basic-form-name">Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-name" type="text" name="name" id="name" placeholder="Name (en)" required @if(!is_null($area->name)) value="{{$area->name}}" @endif />
                                <h6 class="text-danger">{{$errors->first('name')}}</h6>
                        </div>
                        <div class="col-lg-12 right-text mb-3">
                                <label class="form-label" for="basic-form-name"><span class="text-danger">*</span> الاسم</label>
                                <input class="form-control right-text" id="basic-form-name" type="text" name="name_ar" id="name_ar" placeholder="(ar) الاسم"  @if(!is_null($area->name)) value="{{getAttributeTranslated($area,'name')}}" @endif />
                                <h6 class="text-danger">{{$errors->first('name_ar')}}</h6>

                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="basic-form-phone">Emirates </label>
                            <div class="input-group mb-3">
                                <select class="form-select" name="emirate" id="emirate" required>
                                    <option value="">Select Emirates</option>
                                    @foreach($emirates as $emirate)
                                    <option value="{{$emirate->id}}"  @if($area->emirates_id == $emirate->id ) selected  @endif > {{$emirate->name}} ({{getAttributeTranslated($emirate,'name')}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <h6 class="text-danger">{{$errors->first('emirate')}}</h6>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" id="description" rows="3">{{$area->description}}</textarea>
                                </div>
                                <h6 class="text-danger">{{$errors->first('description')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name="status" id="status" @if($area->status) checked="" @endif />
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
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