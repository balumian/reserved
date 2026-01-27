@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Update experience</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('admin.experience.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="data_id" value="{{$experience->id}}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">experience Feature Image <span
                                            class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" id="experience-feature" name="feature" type="file" accept=".jpg,.png,.jpeg" onchange="experienceURLimg(this);">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label" for="basic-form-title">Title <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="basic-form-title" @if(!is_null($experience->title)) value="{{$experience->title}}" @endif type="text" name="title" id="title"
                                        placeholder="Title (en)" required />
                                    <h6 class="text-danger">{{$errors->first('title')}}</h6>
                                </div>
                                <div class="col-lg-6 right-text">
                                    <label class="form-label" for="basic-form-title_ar"><span class="text-danger">*</span>
                                        عنوان</label>
                                    <input class="form-control right-text" @if(!is_null($experience->title)) value="{{getAttributeTranslated($experience,'title')}}" @endif id="basic-form-title_ar" type="text"
                                        name="title_ar" id="title_ar" placeholder="(ar) عنوان" />
                                    <h6 class="text-danger">{{$errors->first('title_ar')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" id="description"
                                        rows="3">{{$experience->description}}</textarea>
                                </div>
                                <h6 class="text-danger">{{$errors->first('description')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"
                                     name="status" id="status" @if($experience->status) checked="" @endif />
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>


            </div>
            <div class="col-lg-4 text-center">
                @if($experience->feature)
                <img src="{{asset('storage/'.$experience->feature)}}" class="img-fluid rounded" id="experience" alt="...">
                @else
                <img src="{{asset('admin/assets/img/placeholder.png')}}" class="img-fluid rounded" id="experience" alt="..." style="display: none;">
                @endif
            </div>
        </div>
    </div>
</div>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop