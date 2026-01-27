@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Add New Business Package</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('admin.business.package.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="form-label" for="basic-form-title">Title <span class="text-danger">*</span></label>
                                    <input class="form-control" id="basic-form-title" type="text" name="title" id="title" placeholder="Title" required />
                                    <h6 class="text-danger">{{$errors->first('title')}}</h6>
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="form-label" for="basic-form-reservations">Reservations </label>
                                    <input class="form-control" id="basic-form-reservations" type="number" name="reservations" id="reservations" placeholder="No. of Reservations"  />
                                    <h6 class="text-danger">{{$errors->first('reservation')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="reservations_label">Reservation Description</label>
                                    <textarea class="form-control" id="reservations_label" name="reservations_label" rows="3" placeholder="Reservation Description.."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="form-label" for="basic-form-contacts">Contacts </label>
                                    <input class="form-control" id="basic-form-contacts" type="number" name="contacts" id="contacts" placeholder="No. of Contacts CRM"  />
                                    <h6 class="text-danger">{{$errors->first('contacts')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label" for="contacts_label">Contacts Description</label>
                                    <textarea class="form-control" id="contacts_label" name="contacts_label" rows="3" placeholder="Contacts Description.."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label" for="basic-form-monthly">Monthly Price </label>
                                    <input class="form-control" id="basic-form-monthly" type="text" name="price" placeholder="Leave Empty if its free"  />
                                    <h6 class="text-danger">{{$errors->first('monthly')}}</h6>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label" for="basic-form-annually">Annualy Price </label>
                                    <input class="form-control" id="basic-form-annually" type="text" name="annual" placeholder="Leave Empty if its free"  />
                                    <h6 class="text-danger">{{$errors->first('annually')}}</h6>
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