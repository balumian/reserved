@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->



<div class="card mb-3" id="countriesTable" data-list='{"valueNames":["cover","title","title_ar","status","created_on"],"page":10,"pagination":true}'>
    <div class="card-header">
        <div class="row flex-between-center">
            <div class="col-4 col-sm-auto d-flex align-items-center pe-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Activities & Attractions</h5>
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
                    <!-- <input class="search" placeholder="Search" /> -->
                    <input class="form-control form-control-sm shadow-none search mb-3" type="search" placeholder="Search..." aria-label="Search">
                    <a href="{{route('admin.attraction.create')}}" class="disable-link">
                        <button class="btn btn-falcon-default btn-sm" type="button">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">New</span>
                        </button>
                    </a>
                    <!-- <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter"
                            data-fa-transform="shrink-3 down-2"></span><span
                            class="d-none d-sm-inline-block ms-1">Filter</span></button> -->
                    <!-- <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button> -->
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
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="feature">Photo</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="title">Title (en)</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="title_ar">Title (ar)</th>
                        <th class="sort pe-1 align-middle white-space-nowrap ps-5" data-sort="status">Status</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="created_on">Created On</th>
                        <th class="align-middle no-sort"></th>
                    </tr>
                </thead>
                <tbody class="list" id="table-customers-body">
                    @foreach($attractions as $attraction)
                    <!-- Name -->
                    <tr class="btn-reveal-trigger">
                        <td class="align-middle py-2" style="width: 28px;">
                            <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                <input class="form-check-input" type="checkbox" id="{{$attraction->id}}" data-bulk-select-row="data-bulk-select-row" name="bulkselect" value="{{$attraction->id}}" />
                            </div>
                        </td>
                        <td class="align-middle white-space-nowrap py-2">
                            <div class="avatar avatar-xl me-2">
                                @if($attraction->media)

                                <img class="rounded-circle" src="{{asset($attraction->media->thumbnail)}}" alt="">

                                @else
                                <div class="avatar-name rounded-circle">
                                    <span>{{get_custom_avatar($attraction->title)}}</span>
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="title align-middle white-space-nowrap py-2">
                            {{$attraction->title}}
                        </td>
                        <td class="title_ar align-middle white-space-nowrap py-2">
                            {{getAttributeTranslated($attraction,'title')}}
                        </td>
                        <!-- Address -->
                        <td class="status align-middle white-space-nowrap ps-5 py-2">
                            @if($attraction->status)
                            <span class="badge rounded-pill badge-soft-success">Active</span>
                            @else
                            <span class="badge rounded-pill badge-soft-danger">Inactive</span>
                            @endif
                        </td>
                        <!-- Created Date -->
                        <td class="created_on align-middle py-2">{{format_date($attraction->created_at,'d/m/Y')}}</td>

                        <!-- Actions -->

                        <td class="align-middle white-space-nowrap py-2 text-end">
                            <div class="dropdown font-sans-serif position-static">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" id="customer-dropdown-0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="customer-dropdown-0">
                                    <div class="py-2">
                                        <a class="dropdown-item" href="/admin/attractions/{{$attraction->id}}/view">View</a>
                                        <a class="dropdown-item" href="/admin/attractions/{{$attraction->id}}/edit">Edit</a>
                                        <form action="{{route('admin.attraction.delete')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="data_id" value="{{$attraction->id}}">
                                            <button type="submit" class="dropdown-item text-danger confirmation">Delete</button>
                                        </form>

                                    </div>
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
                            url: "{{route('admin.attraction.bulk')}}",
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