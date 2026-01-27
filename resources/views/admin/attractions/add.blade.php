@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="row">
    <form method="post" action="{{route('admin.attraction.store')}}" id="add-attraction-form" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <div class="card mb-3 btn-reveal-trigger">
                <div class="card-header position-relative min-vh-30 mb-2">
                    <div class="cover-image">
                        <div class="bg-holder rounded-3 rounded-bottom-0 cover" style="background-image:url({{asset('assets/images/placeholder.jpg')}});">
                        </div>
                        <!--/.bg-holder-->
                        <input class="d-none" id="upload-cover-image" type="file" name="cover_photo" id="cover_photo" accept=".jpg,.png,.jpeg" onchange="changeCover(this);" />
                        <label class="cover-image-file-input" for="upload-cover-image"><span class="fas fa-camera me-2"></span><span>Change cover photo</span></label>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Details</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label" for="title">Title (EN) <span class="text-danger">*</span></label>
                            <input class="form-control" id="title" type="text" name="title" id="title" placeholder="Title in English" required />
                            <h6 class="text-danger">{{$errors->first('name')}}</h6>
                        </div>
                        <div class="col-lg-6 right-text">
                            <label class="form-label" for="title_ar"><span class="text-danger">*</span> (AR) عنوان</label>
                            <input class="form-control right-text" id="title_ar" type="text" placeholder="العنوان بالعربية" name="title_ar" id="title_ar" required />
                            <h6 class="text-danger">{{$errors->first('email')}}</h6>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="stitle">Sub Title (EN) <span class="text-danger">*</span></label>
                            <input class="form-control" id="stitle" type="text" name="stitle" id="stitle" placeholder="Sub Title in English" required />
                            <h6 class="text-danger">{{$errors->first('name')}}</h6>
                        </div>
                        <div class="col-lg-6 right-text">
                            <label class="form-label" for="stitle_ar"><span class="text-danger">*</span> (AR) العنوان الفرعي</label>
                            <input class="form-control right-text" id="stitle_ar" type="text" placeholder="العنوان الفرعي بالعربية" name="stitle_ar" id="stitle_ar" required />
                            <h6 class="text-danger">{{$errors->first('email')}}</h6>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-phone">Phone <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <select class="form-select mb-3" name="code" id="code" style="max-width: 120px;">
                                    @foreach(get_dialing_code() as $code)
                                    <option value="{{$code}}">{{$code}}</option>
                                    @endforeach
                                </select>
                                <input class="form-control mb-3" id="basic-form-phone" type="text" placeholder="501122333" name="phone" id="phone" required />
                                <h6 class="text-danger">{{$errors->first('phone')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="price">Price <span class="text-danger">*</span></label>
                            <input class="form-control" id="price" type="text" name="price" id="price" placeholder="Starting Price" required />
                            <h6 class="text-danger">{{$errors->first('name')}}</h6>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-emirate">Emirate <span class="text-danger">*</span></label>
                            <select class="form-select mb-3" name="emirate" id="emirate" onchange="get_areas(this);" required>
                                <option value="">Select emirates ...</option>
                                @foreach($emirates as $emirate)
                                <option value="{{$emirate->id}}">{{$emirate->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="basic-form-area">Area <span class="text-danger">*</span></label>
                            <select class="form-select mb-3" name="area" id="area" required>
                                <option value="">Select area ...</option>
                                <!-- @foreach($areas as $area)
                                <option value="{{$area->id}}">{{$area->name}}</option>
                                @endforeach -->
                            </select>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="min-vh-50">
                                <label class="form-label" for="description">Description (EN) </label>
                                <textarea class="tinymce d-none" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="min-vh-50 right-text">
                                <label class="form-label" for="description_ar">(AR) وصف</label>
                                <textarea class="tinymce d-none" name="description_ar"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label class="form-label" for="gallery">Gallery </label>
                            <input multiple class="form-control form-control-sm" onchange="changeGallery(this);" id="gallery" name="gallery[]" type="file" accept=".gif, .jpg, .png">
                        </div>
                        <div class="col-lg-6">
                            <span class="form-label d-block" for="status">Status </span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="status" name="status" type="checkbox" checked="" />
                                <label class="form-check-label" for="status">Published</label>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5" id="gallery-preview">
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<script src="{{asset('admin/vendors/tinymce/tinymce.min.js')}}"></script>

<script type="text/javascript" src="{{asset('admin/vendors/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
    function get_areas(input) {
        let emirate = false;
        emirate = $(input).val();
        if (emirate) {
             
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{route('get.specific.areas')}}",
                data: {
                    data_id: emirate,
                },
                success: function(data) {
                    $('#area').html('<option value="">Select area ...</option>');
                        $.each(data.areas, function (key, value) {
                            $("#area").append('<option value="' + key
                                 + '">' + value + '</option>');
                        });
                }

            });
        }


    }

    function changeCover(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.cover')
                    .css('background-image', "url(" + e.target.result + ")")
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function changeGallery(input) {

        if (input.files && input.files[0]) {

            let files = input.files;
            $("#gallery-preview").empty();
            for (let i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    $('#gallery-preview')
                        .append(`<img class="rounded-1 float-start w-25 m-1" src="` + e.target.result + `" alt="" />`)
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
</script>

@stop