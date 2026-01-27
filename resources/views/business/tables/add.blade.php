@extends('business.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Add New Table</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('business.tables.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label">Table Photo <span class="text-danger">*</span></label>
                                        <input class="form-control form-control-sm" id="table-photo" name="photo" type="file" onchange="readPhotoURL(this);" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label" for="table">Table No (EN) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="table" type="text" name="table" id="title" placeholder="Table No (EN)" required />
                                    <h6 class="text-danger">{{$errors->first('title')}}</h6>
                                </div>
                                <div class="col-lg-6 right-text">
                                    <label class="form-label" for="table_ar"><span class="text-danger">*</span>
                                        (AR) رقم الطاولة</label>
                                    <input class="form-control right-text" id="table_ar" type="text" name="table_ar" id="title_ar" placeholder="(AR) رقم الطاولة" />
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label" for="chairs">Chairs (EN) <span class="text-danger">*</span></label>
                                    <input class="form-control" id="chairs" type="text" name="chairs" id="chairs" placeholder="Chairs (EN)" required />
                                    <h6 class="text-danger">{{$errors->first('chairs')}}</h6>
                                </div>
                                <div class="col-lg-6 right-text">
                                    <label class="form-label" for="chairs_ar"><span class="text-danger">*</span>
                                        (AR) كراسي جلوس</label>
                                    <input class="form-control right-text" id="chairs_ar" type="text" name="chairs_ar" id="chairs_ar" placeholder="(AR) كراسي جلوس" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" id="description" rows="3"></textarea>
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
            <div class="col-lg-4 text-center">
                <img src="{{asset('admin/assets/img/placeholder.png')}}" class="img-fluid rounded" id="photo" alt="..." style="display: none;">
            </div>
        </div>
    </div>
</div>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
<script type="text/javascript" src="{{asset('admin/vendors/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
    function readPhotoURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo')
                .attr('src', e.target.result)
                .css('display','block')
                .css('margin','auto')
        };
        reader.readAsDataURL(input.files[0]);
    }
} 
</script>

@stop

