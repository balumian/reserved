@extends('business.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h5 class="mb-2">{{$profile->name}} (<a href="mailto:{{$profile->email}} ">{{$profile->email}} </a>)
                </h5>
            </div>
            <div class="col-auto d-none d-sm-block">
                <h6 class="text-uppercase text-600">Business Account<span class="fas fa-user ms-2"></span></h6>
            </div>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
            <div class="flex-1">
                <p class="mb-0">Account was created</p>
                <p class="fs--1 mb-0 text-600">{{format_date($profile->created_at,'M d, Y, h:i A')}}</p>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <form method="post" id="business-user-update" action="{{route('business.account.update')}}">
        @csrf
        <input type="hidden" value="{{$profile->id}}" name="user">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Account Information</h5>
                </div>
                <div class="col-auto">
                    <!-- <a class="btn btn-falcon-default btn-sm" href="#!"><span
                        class="fas fa-pencil-alt fs--2 me-1"></span>Update details</a> -->
                </div>
            </div>
        </div>
        <div class="card-body bg-light border-top">

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg col-xxl-5">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-form-name">Full Name <span class="text-danger">*</span></label>
                                        <input class="form-control" id="basic-form-name" type="text" value="{{$profile->name}}" name="name" id="name" placeholder="Full Name" required />
                                        <h6 class="text-danger">{{$errors->first('name')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-form-email">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" id="basic-form-email" value="{{$profile->email}}" type="email" placeholder="name@example.com" name="email" id="email" required />
                                        <h6 class="text-danger">{{$errors->first('email')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-form-phone">Phone <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <select class="form-select mb-3" name="code" id="code" style="max-width: 120px;">
                                            @foreach(get_dialing_code() as $code)
                                            <option value="{{$code}}" @if($profile->profile->code == $code) selected @endif>{{$code}}</option>
                                            @endforeach
                                        </select>
                                        <input class="form-control mb-3" id="basic-form-phone" value="{{checkIsNull($profile->profile) ? $profile->profile->phone : '' }}" type="text" placeholder="501122333" name="phone" id="phone" required />
                                    </div>
                                    <h6 class="text-danger">{{$errors->first('phone')}}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-form-address">Address </label>
                                    <textarea class="form-control" id="basic-form-address" rows="3" name="address" id="address" >{{$profile->profile->address}}</textarea>
                                    <h6 class="text-danger">{{$errors->first('address')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-form-nationality">Nationality <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" name="nationality" id="nationality" required>
                                         @foreach(nationalities() as $country)
                                            <option value="{{$country->id}}" @if($profile->profile->nationality == $country->id) selected @endif>{{$country->name}}</option>
                                         @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="emirate">Emirate <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" name="emirate" id="emirate" onchange="get_areas(this);" required>
                                    <option value="">Select emirate ...</option>
                                        @foreach(emirates() as $emirate)
                                        <option value="{{$emirate->id}}" {{$profile->profile->emirate == $emirate->id? 'selected':''}}>
                                            {{$emirate->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="area">Area <span class="text-danger">*</span></label>
                                    <select class="form-select mb-3" name="area" id="area" required>
                                    <option value="">Select area ...</option>
                                        @foreach(get_area_by_emirate($profile->profile->emirate) as $area)
                                        <option value="{{$area->id}}" {{$profile->profile->area == $area->id? 'selected':''}}>
                                            {{$area->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer border-top text-end">

            <button class="btn btn-falcon-default btn-sm ms-2">
                <span class="fas fa-check fs--2 me-1"></span>
                Save changes
            </button>
        </div>
    </form>
</div>

<div class="card mb-3">
    <form method="post" id="password-update" action="{{route('business.password.update')}}">
        @csrf
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Change Password</h5>
                </div>
                <div class="col-auto">
                    <!-- <a class="btn btn-falcon-default btn-sm" href="#!"><span
                        class="fas fa-pencil-alt fs--2 me-1"></span>Update details</a> -->
                </div>
            </div>
        </div>
        <div class="card-body bg-light border-top">

            <div class="row">

                <div class="col-lg col-xxl-5">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-password">Password <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="password"
                                    placeholder="Password" name="password" id="password" @if($errors->first('password')) autofocus @endif >
                                <h6 class="text-danger">{{$errors->first('password')}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-password">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="password"
                                    placeholder="Confirm Password" name="password_confirmation"
                                    id="password_confirmation" >
                                <h6 class="text-danger">{{$errors->first('password_confirmation')}}</h6>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="card-footer border-top text-end">

            <button class="btn btn-falcon-default btn-sm ms-2">
                <span class="fas fa-check fs--2 me-1"></span>
                Update
            </button>
        </div>
    </form>
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