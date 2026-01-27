@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Update Feature</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('admin.feature.update')}}" method="post">
                    <input type="hidden" name="data_id" value="{{$feature->id}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label" for="basic-form-title">Title <span class="text-danger">*</span></label>
                                    <input class="form-control" id="basic-form-title" type="text" name="title" id="title" placeholder="Title (en)" required @if(!is_null($feature->title)) value="{{$feature->title}}" @endif />
                                    <h6 class="text-danger">{{$errors->first('title')}}</h6>
                                </div>
                                <div class="col-lg-6 right-text">
                                    <label class="form-label" for="basic-form-title_ar"><span class="text-danger">*</span> عنوان</label>
                                    <input class="form-control right-text" id="basic-form-title_ar" type="text" name="title_ar" id="title_ar" placeholder="(ar) عنوان" @if(!is_null($feature->title)) value="{{getAttributeTranslated($feature,'title')}}" @endif />
                                    <h6 class="text-danger">{{$errors->first('title_ar')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" id="description" rows="3">{{$feature->description}}</textarea>
                                </div>
                                <h6 class="text-danger">{{$errors->first('description')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name="status" id="status" @if($feature->status) checked="" @endif />
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