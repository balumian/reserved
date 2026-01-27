@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Add New Emirate</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('admin.emirate.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label" for="basic-form-name">Name <span class="text-danger">*</span></label>
                                    <input class="form-control" id="basic-form-name" type="text" name="name" id="name" placeholder="Name (en)" required />
                                    <h6 class="text-danger">{{$errors->first('name')}}</h6>
                                </div>
                                <div class="col-lg-6 right-text">
                                    <label class="form-label" for="basic-form-name"><span class="text-danger">*</span> الاسم</label>
                                    <input class="form-control right-text" id="basic-form-name" type="text" name="name_ar" id="name_ar" placeholder="(ar) الاسم"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" name="status" id="status" />
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