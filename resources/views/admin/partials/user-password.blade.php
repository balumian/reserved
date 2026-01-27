<div class="card mb-3">
    <form method="post" id="password-update" action="{{route('customer.password')}}">
        @csrf
        <input type="hidden" value="{{$customer->id}}" name="user">
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