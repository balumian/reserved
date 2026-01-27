@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Add New Experience</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('admin.experience.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Experience Feature Image <span
                                            class="text-danger">*</span></label>
                                <input class="form-control form-control-sm" id="experience-feature" name="feature" type="file" accept=".jpg,.png,.jpeg" onchange="experienceURLimg(this);" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label" for="basic-form-title">Title <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" id="basic-form-title" type="text" name="title" id="title"
                                        placeholder="Title (en)" required />
                                    <h6 class="text-danger">{{$errors->first('title')}}</h6>
                                </div>
                                <div class="col-lg-6 right-text">
                                    <label class="form-label" for="basic-form-title_ar"><span class="text-danger">*</span>
                                        عنوان</label>
                                    <input class="form-control right-text" id="basic-form-title_ar" type="text"
                                        name="title_ar" id="title_ar" placeholder="(ar) عنوان" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" id="description"
                                        rows="3"></textarea>
                                </div>
                                <h6 class="text-danger">{{$errors->first('description')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"
                                        checked="" name="status" id="status" />
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>


            </div>
            <div class="col-lg-4 text-center">
                <img src="{{asset('admin/assets/img/placeholder.png')}}" class="img-fluid rounded" id="experience" alt="..." style="display: none;">
            </div>
        </div>
    </div>
</div>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop