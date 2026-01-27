@extends('business.layouts.app')
@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Update Perk & Offer</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('business.perks.update')}}" method="post">
                    <input type="hidden" name="data_id" value="{{$perk->id}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                                    <input class="form-control" id="title" type="text" name="title" id="title" value="{{$perk->title}}" placeholder="Title (en)" required />
                                    <h6 class="text-danger">{{$errors->first('title')}}</h6>
                                </div>
                                <div class="col-lg-6 right-text">
                                    <label class="form-label" for="title_ar"><span class="text-danger">*</span> عنوان</label>
                                    <input class="form-control right-text" id="title_ar" type="text" value="{{getAttributeTranslated($perk,'title')}}" name="title_ar" id="title_ar" placeholder="(ar) عنوان" />
                                    <h6 class="text-danger">{{$errors->first('title_ar')}}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="emirate">Emirates
                                            <span class="text-danger">*</span></label>
                                        <select class="form-select" name="emirate" id="emirate" onchange="get_areas(this);">
                                            <option value="">Select emirates ...</option>
                                            @foreach($emirates as $emirate)
                                                <option value="{{$emirate->id}}" @if($emirate->id == $perk->emirate_id) selected @endif>
                                                    {{$emirate->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="area">Area <span class="text-danger">*</span></label>
                                        <select class="form-select" name="area" id="area">
                                            <option value="">Select area ...</option>
                                            @foreach(get_area_by_emirate( $perk->emirate_id) as $area)
                                                <option value="{{$area->id}}" @if($area->id == $perk->area_id) selected @endif>
                                                    {{$area->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label" for="expiry">Expiry Date </label>
                                    <input class="form-control " id="expiry" type="date" value="{{$perk->expiry}}" name="expiry" placeholder="Expiry Date" />
                                    <h6 class="text-danger">{{$errors->first('expiry')}}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label" for="perk-type">Type </label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="perk" type="radio" name="type" value="perks" @if($perk->type == 'perks') checked @endif />
                                        <label class="form-check-label" for="perk">Perks</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" id="offer" type="radio" name="type" value="offers" @if($perk->type == 'offers') checked @endif />
                                        <label class="form-check-label" for="offer">Offer</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="status" id="status" type="checkbox" @if($perk->status) checked @endif  />
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
                    $.each(data.areas, function(key, value) {
                        $("#area").append('<option value="' + key +
                            '">' + value + '</option>');
                    });
                }

            });
        }


    }

    
</script>
@stop