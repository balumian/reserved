<div class="card mb-3">
    <form method="post" id="user-update" action="{{route('customer.update')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$customer->id}}" name="user">
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
                </div>
                <div class="col-lg-6 mb-3" style="height: 200px">
                    <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle" style="top: 0px;">
                        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                            @if($customer->profile)
                            <img id="customer-pro-pic" @if($customer->profile->avatar) src="{{asset('storage/'.$customer->profile->avatar)}}" @else src="{{asset('assets/images/profile.png')}}" @endif width="200" alt="" />
                            @else
                            <img src="{{asset('assets/images/profile.png')}}" width="200" alt="" id="customer-pro-pic" />
                            @endif
                            <input class="d-none" id="profile-image" type="file" name="avatar" onchange="readURL(this);" accept=".png,.jpg,.jpeg" />
                            <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><span class="fas fa-camera"></span><span class="d-block">Update</span></span></label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg col-xxl-5">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-form-name">Full Name <span class="text-danger">*</span></label>
                                        <input class="form-control" id="basic-form-name" type="text" value="{{$customer->name}}" name="name" id="name" placeholder="Full Name" required />
                                        <h6 class="text-danger">{{$errors->first('name')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-form-email">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" id="basic-form-email" value="{{$customer->email}}" type="email" placeholder="name@example.com" name="email" id="email" required />
                                        <h6 class="text-danger">{{$errors->first('email')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-form-phone">Phone </label>
                                    <div class="input-group mb-3">
                                        <select class="form-select mb-3" name="code" id="code" style="max-width: 120px;">
                                            @foreach(get_dialing_code() as $code)
                                            <option value="{{$code}}" @if($customer->profile && $customer->profile->code == $code) selected @endif>{{$code}}</option>
                                            @endforeach
                                        </select>
                                        <input class="form-control mb-3" id="basic-form-phone" value="{{checkIsNull($customer->profile) ? $customer->profile->phone : '' }}" type="text" placeholder="501122333" name="phone" id="phone" />
                                    </div>
                                    <h6 class="text-danger">{{$errors->first('phone')}}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-form-address">Address </label>
                                    <input class="form-control" id="basic-form-address" value="{{checkIsNull($customer->profile) ? $customer->profile->address : ''}}" type="text" name="address" id="address" />
                                    <h6 class="text-danger">{{$errors->first('address')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-form-nationality">Nationality </label>
                                    <select class="form-select mb-3" name="nationality" id="nationality">
                                        <option value="">Select your nationality ...</option>
                                        @foreach(nationalities() as $country)
                                        <option value="{{$country->id}}" @if($customer->profile && $country->id == $customer->profile->nationality ) selected @endif>{{$country->name}} </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-form-emirate">Emirate </label>
                                    <select class="form-select mb-3" name="emirate" id="emirate" onchange="get_areas(this);">
                                        <option value="">Select emirates ...</option>
                                        @foreach(emirates() as $emirate)
                                        <option value="{{$emirate->id}}" @if($customer->profile && $emirate->id == $customer->profile->emirate ) selected @endif>{{$emirate->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="basic-form-area">Area </label>
                                    <select class="form-select mb-3" name="area" id="area">
                                        <option value="">Select areas ...</option>
                                        @if($customer->profile)
                                        @foreach(get_area_by_emirate($customer->profile->emirate) as $area)
                                        <option value="{{$area->id}}" @if($area->id == $customer->profile->area ) selected @endif>{{$area->name}} </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <h6 class="text-danger">{{$errors->first('area')}}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="form-label" for="status">Status </label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" id="status" name="status" type="checkbox" @if($customer->status) checked @endif />
                                        <label class="form-check-label" for="status">Active</label>
                                    </div>
                                    <h6 class="text-danger">{{$errors->first('status')}}</h6>
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