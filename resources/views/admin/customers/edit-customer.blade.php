@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h5 class="mb-2">{{$customer->name}} (<a href="mailto:{{$customer->email}} ">{{$customer->email}} </a>)
                    @if(!$customer->banned)
                    <span class="badge rounded-pill badge-soft-success">Active</span>
                    @else
                    <span class="badge rounded-pill badge-soft-danger">Banned</span>
                    @endif
                </h5>
                <!-- <a class="btn btn-falcon-default btn-sm" href="#!"><span class="fas fa-plus fs--2 me-1"></span>Add
                    note</a> -->
                <!-- <button class="btn btn-falcon-default btn-sm dropdown-toggle ms-2 dropdown-caret-none" type="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                        class="fas fa-ellipsis-h"></span></button> -->
                
                <!-- <div class="dropdown-menu"><a class="dropdown-item" href="#">Edit</a>
                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                        href="/admin/delete/{{$customer->id}}/customer">Delete user</a>
                </div> -->
            </div>
            <div class="col-auto d-none d-sm-block">
                <h6 class="text-uppercase text-600">User<span class="fas fa-user ms-2"></span></h6>
            </div>
        </div>
    </div>
    <div class="card-body border-top">
        <div class="d-flex"><span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
            <div class="flex-1">
                <p class="mb-0">User was created</p>
                <p class="fs--1 mb-0 text-600">{{format_date($customer->created_at,'M d, Y, h:i A')}}</p>
            </div>
        </div>
    </div>
</div>

@include('admin.partials.user-details')
@include('admin.partials.user-password')

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