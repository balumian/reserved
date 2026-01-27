@extends('layouts.customer')
@section('title','Reserved :: My Profile')

@section('content')

<div class="col-lg-9 col-12">
    <form method="post" action="{{route('profile.update')}}" id="customer-profile-update" enctype="multipart/form-data">
        @csrf
        <div class="content-box-bg">
            <div class="page-heading animated fadeIn">
                <h2>Edit Profile</h2>
            </div>

            <div class="content-box animated fadeIn">
                <div class="my-profile">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <div class="profile-pic">
                                @if($profile && $profile->avatar)
                                <img class="pro-pic img-fluid" @if($profile->avatar) src="{{asset('storage/'.$profile->avatar)}}" @else src="{{asset('assets/images/profile.png')}}" @endif >
                                @else
                                <img class="pro-pic img-fluid"  src="{{asset('assets/images/profile.png')}}"  >
                                @endif
                                <div class="right-side">
                                    <div class="upload-pro">
                                        <span>Upload Photo</span>
                                        <input type="file" name="avatar" title="Click to add Files"  onchange="readURL(this);" accept=".png,.jpg,.jpeg">
                                    </div>
                                    <a href="{{route('profile.avatar')}}" class="del-btn"><i class="fa fa-trash-o"></i> Remove</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-bg">
                                <label for="name" class="input-label">Name <span>*</span></label>
                                <input type="text" class="input-item" id="name" 
                                    value="{{auth()->user()->name}}" placeholder="" name="name">
                                <p class="text-danger">{{$errors->first('name')}}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-bg">
                                <label for="email" class="input-label">Email <span>*</span></label>
                                <input type="text" class="input-item" id="email" placeholder=""
                                    value="{{auth()->user()->email}}" name="email">
                                <p class="text-danger">{{$errors->first('email')}}</p>
                                
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-bg group-input-bg">
                                <label for="Phone" class="input-label">Phone <span>*</span></label>
                                <div class="input-group">
                                    <select name="code" id="code" class="input-item form-select" @if($profile) value="{{checkIsNull($profile->code)}}" @endif>
                                        @foreach(get_dialing_code() as $code)
                                        <option value="{{$code}}" @if($profile && $profile->code == $code) selected @endif>{{$code}}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" class="input-item" id="phone" placeholder="" @if($profile) value="{{checkIsNull($profile->phone)}}" @endif
                                        name="phone"  ><br>
                                    <p class="text-danger">{{$errors->first('phone')}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-bg">
                                <label for="nationality" class="input-label">Nationality <span>*</span></label>
                                <select name="nationality" id="nationality" class="input-item form-select" @if($profile) value="{{!empty($profile->nationality) && $profile->nationality}}" @endif>
                                    <option value="">Select your nationality ...</option>
                                    @foreach(nationalities() as $country)
                                    <option value="{{$country->id}}" @if($profile && $country->id == $profile->nationality ) selected @endif>{{$country->name}} </option>
                                    @endforeach
                                </select>
                                <p class="text-danger">{{$errors->first('nationality')}}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-bg">
                                <label for="emirate" class="input-label">Emirate <span>*</span></label>
                                <select name="emirate" id="emirate" class="input-item form-select" onchange="get_areas(this);" @if($profile) value="{{!empty($profile->emirate) && $profile->emirate}}" @endif>
                                    <option value="">Select emirates ...</option>
                                        @foreach(emirates() as $emirate)
                                        <option value="{{$emirate->id}}" @if($profile && $emirate->id == $profile->emirate ) selected @endif>{{$emirate->name}} </option>
                                        @endforeach
                                </select>
                                <p class="text-danger">{{$errors->first('emirate')}}</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="input-bg">
                                <label for="area" class="input-label">Area <span>*</span></label>
                                <select name="area" id="area" class="input-item form-select" @if($profile) value="{{!empty($profile->area) && $profile->area}}" @endif>
                                    <option value="">Select areas ...</option>
                                    @if($profile)
                                    @foreach(get_area_by_emirate($profile->emirate) as $area)
                                    <option value="{{$area->id}}" @if($area->id == $profile->area ) selected @endif>{{$area->name}} </option>
                                    @endforeach
                                    @endif
                                </select>
                                <p class="text-danger">{{$errors->first('area')}}</p>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="input-bg">
                                <label for="address" class="input-label">Address <span>*</span></label>
                                <input type="text" class="input-item" id="address" @if($profile) value="{{checkIsNull($profile->address)}}" @endif
                                    placeholder="" name="address">
                                <p class="text-danger">{{$errors->first('address')}}</p>
                            </div>
                        </div>


                        <div class="col-lg-12 col-12">
                            <div class="change-pass">
                                <h4>Password</h4>
                                <div class="row">

                                    <div class="col-lg-12 col-12">
                                        <div class="input-bg">
                                            <label for="current_password" class="input-label">Current Password</label>
                                            <input autocomplete="off" type="password" class="input-item" id="current_password" 
                                                value="" placeholder="" name="current_password">
                                            <p class="text-danger">{{$errors->first('current_password')}}</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="input-bg">
                                            <label for="password" class="input-label">New Password</label>
                                            <input type="password" class="input-item" id="password"  value=""
                                                placeholder="" name="password">
                                            <p class="text-danger">{{$errors->first('password')}}</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <div class="input-bg">
                                            <label for="password_confirmation" class="input-label">Confirm Password</label>
                                            <input type="password" class="input-item" id="password_confirmation"  value=""
                                                placeholder="" name="password_confirmation">
                                            <p class="text-danger">{{$errors->first('password_confirmation')}}</p>
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <button type="submit" class="btn-green">UPDATE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@stop

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