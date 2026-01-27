@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

@if(session('status'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
  <div class="toast fade show" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-success text-white"><strong class="me-auto">Success</strong><small>Now</small>
      <button class="btn-close btn-close-white" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{session('status')}}</div>
  </div>
</div>
@endif
<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Add New User</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('customer.save')}}" method="post" id="admin-add-customer">
                @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-name">Full Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-name" type="text" name="name" id="name"
                                    placeholder="Full Name" required />
                                <h6 class="text-danger">{{$errors->first('name')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-email">Email <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-email" type="email"
                                    placeholder="name@example.com" name="email" id="email" required />
                                <h6 class="text-danger">{{$errors->first('email')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check form-switch" id="autopassword">
                                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"
                                    name="autopassword"  />
                                <label class="form-check-label" for="flexSwitchCheckChecked">Auto generate
                                    password</label>
                            </div>
                        </div>
                            <div class="col-lg-6 customer-password">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-password">Password</label>
                                    <input class="form-control" type="password"
                                        placeholder="Password" name="password" id="password" />
                                    <h6 class="text-danger">{{$errors->first('password')}}</h6>
                                </div>
                            </div>
                            <div class="col-lg-6 customer-password">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-form-password">Confirm Password</label>
                                    <input class="form-control" type="password"
                                        placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" />
                                    <h6 class="text-danger">{{$errors->first('password_confirmation')}}</h6>
                                </div>
                            </div>
                         <div class="col-lg-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"
                                    checked="" name="sendaccount" id="sendaccount"/>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Send account information to
                                    user via email</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" name="accountverified"/>
                                <label class="form-check-label" for="flexSwitchCheckChecked" >Mark account as
                                    verified</label>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6"></div> -->
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>


            </div>
        </div>
    </div>
</div>



<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop