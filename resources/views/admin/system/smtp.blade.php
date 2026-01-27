@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">SMTP Configurations</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('admin.country.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-iso">Mail Host <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-iso" type="text" name="iso" id="iso" placeholder="smtp@gmail.com" value="{{env('MAIL_HOST')}}" required />
                                <h6 class="text-danger">{{$errors->first('iso')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-iso">Mail Port <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-iso" type="text" name="iso" id="iso" placeholder="465" required />
                                <h6 class="text-danger">{{$errors->first('iso')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-iso">Mail Username <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-iso" type="text" name="iso" id="iso" placeholder="example@example.com" required />
                                <h6 class="text-danger">{{$errors->first('iso')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-iso">Mail Password <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-iso" type="text" name="iso" id="iso" placeholder="Password" required />
                                <h6 class="text-danger">{{$errors->first('iso')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-iso">Mail Encryption <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-iso" type="text" name="iso" id="iso" placeholder="ssl/tsl" required />
                                <h6 class="text-danger">{{$errors->first('iso')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-iso">Mail From Address <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-iso" type="text" name="iso" id="iso" placeholder="example@example.com" required />
                                <h6 class="text-danger">{{$errors->first('iso')}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="basic-form-iso">Mail From Name <span class="text-danger">*</span></label>
                                <input class="form-control" id="basic-form-iso" type="text" name="iso" id="iso" placeholder="Reserved System" required />
                                <h6 class="text-danger">{{$errors->first('iso')}}</h6>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>


            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <label class="form-label" for="basic-form-iso">Email <span class="text-danger">*</span></label>
                    <input class="form-control" id="basic-form-iso" type="text" name="iso" id="iso" placeholder="example@example.com" required />
                    <h6 class="text-danger">{{$errors->first('iso')}}</h6>
                </div>
                <div class="mb-3">
                    <button class="btn btn-info me-1 mb-1" type="button">Send Test Email
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop