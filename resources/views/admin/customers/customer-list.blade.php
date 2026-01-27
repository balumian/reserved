@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->



<div class="card mb-3" id="customersTable" data-list='{"valueNames":["name","email","nationality","emirates","status","joined"],"page":10,"pagination":true,"filter":{"key":"emirates"}}'>
    <div class="card-header">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Users</h5>
            </div>
            <div class="col-8 col-sm-auto text-end ps-2">
                <div class="d-none" id="table-customers-actions">
                    <div class="d-flex">
                        <select class="form-select form-select-sm" id="action" name="action" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="delete">Delete</option>
                        </select>
                        <button class="btn btn-falcon-default btn-sm ms-2 bulkdelete" type="button">Apply</button>
                    </div>
                </div>
                <div id="table-customers-replace-element">
                    <div class="row justify-content-end g-0">
                        <div class="col-auto px-1">
                            <input class="form-control form-control-sm shadow-none search" type="search" placeholder="Search..." aria-label="Search">
                        </div>
                        <div class="col-auto px-1">
                            <select class="form-select form-select-sm mb-3" aria-label="Bulk actions" data-list-filter="data-list-filter">
                                <option selected="" value="">Select Emirate</option>
                                <option value="Abu Dhabi">Abu Dhabi</option>
                                <option value="Dubai">Dubai</option>
                                <option value="Sharjah">Sharjah</option>
                                <option value="Ajman">Ajman</option>
                                <option value="Umm Al Quwain">Umm Al Quwain</option>
                                <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                                <option value="Fujairah">Fujairah</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('customer.add')}}" class="disable-link">
                                <button class="btn btn-falcon-default btn-sm" type="button">
                                    <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                                    <span class="d-none d-sm-inline-block ms-1">New</span>
                                </button>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive scrollbar">
            <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                <thead class="bg-200 text-900">
                    <tr>
                        <th>
                            <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                <input class="form-check-input" id="checkbox-bulk-customers-select" type="checkbox" data-bulk-select='{"body":"table-customers-body","actions":"table-customers-actions","replacedElement":"table-customers-replace-element"}' />
                            </div>
                        </th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Name</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="email">Email</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="nationality">Nationality</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="emirates">Emirates</th>
                        <th class="sort pe-1 align-middle white-space-nowrap ps-5" data-sort="status" style="min-width: 200px;">Status</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="joined">Joined</th>
                        <th class="align-middle no-sort"></th>
                    </tr>
                </thead>
                <tbody class="list" id="table-customers-body">

                    @foreach($customers as $customer)
                    <!-- Name -->
                    <tr class="btn-reveal-trigger">
                        <td class="align-middle py-2" style="width: 28px;">
                            <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="{{$customer->id}}" data-bulk-select-row="data-bulk-select-row" name="bulkselect" value="{{$customer->id}}" />

                            </div>
                        </td>
                        <td class="name align-middle white-space-nowrap py-2"><a href="/admin/view/{{$customer->id}}/customer">
                                <div class="d-flex d-flex align-items-center">
                                    <div class="avatar avatar-xl me-2">
                                        @if(!empty($customer->profile->avatar))
                                        <img class="rounded-circle" src="{{asset('storage/'.$customer->profile->avatar)}}" alt="" />
                                        @else
                                        <div class="avatar-name rounded-circle">
                                            <span>{{get_custom_avatar($customer->name)}}</span>
                                        </div>
                                        @endif

                                    </div>
                                    <div class="flex-1">
                                        <h5 class="mb-0 fs--1">{{$customer->name}}</h5>
                                    </div>
                                </div>
                            </a>
                        </td>
                        <!-- Email -->
                        <td class="email align-middle py-2">
                            <a href="mailto:{{$customer->email}}">{{$customer->email}}</a>
                        </td>
                        <!-- Nationality -->
                        <td class="nationality align-middle white-space-nowrap py-2">
                            @if(!empty($customer->profile))
                            {{$customer->profile->country->name}}
                            @else
                            ---
                            @endif
                        </td>

                        <!-- Emirates -->
                        <td class="emirates align-middle white-space-nowrap py-2">
                            @if(!empty($customer->profile))
                            {{$customer->profile->emirates->name}}
                            @else
                            ---
                            @endif
                        </td>

                        <!-- Status -->
                        <td class="status align-middle white-space-nowrap ps-5 py-2">
                            @if($customer->status)
                            <span class="badge rounded-pill badge-soft-success">Active</span>
                            @else
                            <span class="badge rounded-pill badge-soft-danger">Banned</span>
                            @endif
                        </td>
                        <!-- Created Date -->
                        <td class="joined align-middle py-2">{{format_date($customer->created_at,'d/m/Y')}}</td>

                        <!-- Actions -->

                        <td class="align-middle white-space-nowrap py-2 text-end">
                            <div class="dropdown font-sans-serif position-static">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0">
                                    <div class="py-2"><a class="dropdown-item" href="/admin/edit/{{$customer->id}}/customer">Edit</a>
                                        <form action="{{route('customer.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="data_id" value="{{$customer->id}}">
                                            <button type="submit" class="dropdown-item text-danger confirmation">Delete</button>
                                        </form>
                                    </div>
                                </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer d-flex align-items-center justify-content-center">
        <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
        <ul class="pagination mb-0"></ul>
        <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
    </div>
</div>
<!-- Script -->
<script src="{{asset('admin/vendors/alert/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
    $('.confirmation').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

    $('.bulkdelete').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        var bulks = [];
        $('input:checkbox[name=bulkselect]:checked').each(function() {
            bulks.push($(this).val());
        });
        var act = $('#action').val();
        event.preventDefault();
        if (bulks.length > 0) {
            swal({
                    title: `Are you sure you want to delete following records?`,
                    text: "If you delete this, all selected items will be gone forever.",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url: "{{ route('admin.themes.bulk') }}",
                            data: {
                                action: act,
                                list: bulks
                            },
                            success: function(data) {
                                location.reload();
                            }

                        });
                    }
                });
        }
    });
</script>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop