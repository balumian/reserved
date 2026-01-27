@extends('admin.layouts.app')

@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->



<div class="row mb-3 g-3">
    <div class="col-lg-12 col-xxl-9">
        <div class="row g-3 mb-3">
            <div class="col-sm-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <h6>Total Customers<span class="badge badge-soft-warning rounded-pill ms-2">-0.23%</span></h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":58.386,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/customers.html">See all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card overflow-hidden" style="min-width: 12rem">
                    <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <h6>Total Businesses<span class="badge badge-soft-info rounded-pill ms-2">0.0%</span></h6>
                        <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":23.434,"decimalPlaces":2,"suffix":"k"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="../app/e-commerce/orders/order-list.html">See all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 ps-lg-2 mb-3">
                <div class="card h-lg-100">
                    <div class="card-header">
                        <div class="row flex-between-center">
                            <div class="col-auto">
                                <h6 class="mb-0">Total Reservations</h6>
                            </div>
                            <div class="col-auto d-flex">
                                <select class="form-select form-select-sm select-month me-2">
                                    <option value="0">January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                    <option value="4">May</option>
                                    <option value="5">Jun</option>
                                    <option value="6">July</option>
                                    <option value="7">August</option>
                                    <option value="8">September</option>
                                    <option value="9">October</option>
                                    <option value="10">November</option>
                                    <option value="11">December</option>
                                </select>
                                <div class="dropdown font-sans-serif btn-reveal-trigger">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-total-sales" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-total-sales"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body h-100 pe-0">
                        <!-- Find the JS file for the following chart at: src\js\charts\echarts\total-sales.js-->
                        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public\assets\js\theme.js-->
                        <div class="echart-line-total-sales h-100" data-echart-responsive="true"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3">
        <div class="card">
            <div class="card-header d-flex flex-between-center py-2 border-bottom">
                <h6 class="mb-0">Most View Activities</h6>
                <div class="dropdown font-sans-serif btn-reveal-trigger">
                    <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-most-leads" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-most-leads"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                    </div>
                </div>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="row align-items-center">
                    <div class="col-md-5 col-xxl-12 mb-xxl-1">
                        <div class="position-relative">
                            <!-- Find the JS file for the following chart at: src/js/charts/echarts/most-leads.js-->
                            <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                            <div class="echart-most-leads my-2" data-echart-responsive="true"></div>
                            <div class="position-absolute top-50 start-50 translate-middle text-center">
                                <p class="fs--1 mb-0 text-400 font-sans-serif fw-medium">Total</p>
                                <p class="fs-3 mb-0 font-sans-serif fw-medium mt-n2">15.6k</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-12 col-md-7">
                        <hr class="mx-ncard mb-0 d-md-none d-xxl-block" />
                        <div class="d-flex flex-between-center border-bottom py-3 pt-md-0 pt-xxl-3">
                            <div class="d-flex"><img class="me-2" src="{{asset('assets/images/login-bg.jpg')}}" width="16" height="16" alt="..." />
                                <h6 class="text-700 mb-0">Jumeirah Lake Towers </h6>
                            </div>
                            <p class="fs--1 text-500 mb-0 fw-semi-bold"></p>
                            <h6 class="text-700 mb-0">54</h6>
                        </div>
                        <div class="d-flex flex-between-center border-bottom py-3">
                            <div class="d-flex"><img class="me-2" src="{{asset('assets/images/login-bg.jpg')}}" width="16" height="16" alt="..." />
                                <h6 class="text-700 mb-0">Jumeirah Lake Towers </h6>
                            </div>
                            <p class="fs--1 text-500 mb-0 fw-semi-bold"></p>
                            <h6 class="text-700 mb-0">27</h6>
                        </div>
                        <div class="d-flex flex-between-center border-bottom py-3">
                            <div class="d-flex"><img class="me-2" src="{{asset('assets/images/login-bg.jpg')}}" width="16" height="16" alt="..." />
                                <h6 class="text-700 mb-0">Jumeirah Lake Towers </h6>
                            </div>
                            <p class="fs--1 text-500 mb-0 fw-semi-bold"></p>
                            <h6 class="text-700 mb-0">4</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block py-2" href="#!">View all<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
        </div>
    </div>
</div>

<div class="row mb-3 g-3">
    <div class="col-lg-12">
        <div class="card" id="CrmLocationBySessionTable" data-list='{"valueNames":["country","sessions","users"],"page":3,"pagination":true}'>
            <div class="card-header d-flex flex-between-center bg-light py-2">
                <h6 class="mb-0">Top Locations</h6>
                <div class="d-flex">
                    <div class="btn-reveal-trigger">
                        <button class="btn btn-link btn-reveal btn-sm location-by-session-map-reset" type="button"><span class="fas fa-sync-alt fs--1"></span></button>
                    </div>
                    <div class="dropdown font-sans-serif btn-reveal-trigger">
                        <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="crm-location-by-session" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="crm-location-by-session"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0 position-relative">
                <!-- Find the JS file for the following chart at: src/js/charts/echarts/location-by-session-crm.js-->
                <!-- If you are not using gulp based workflow, you can find the transpiled code at: public/assets/js/theme.js-->
                <div class="echart-location-by-session-map" data-echart-responsive="true" style="height:302px;"></div>
                <div class="position-absolute top-0 border mt-3 border-200 rounded-3 bg-light">
                    <button class="btn btn-link btn-sm bg-100 rounded-bottom-0 px-2 location-by-session-map-zoom text-700" type="button"><span class="fas fa-plus fs--1"></span></button>
                    <hr class="text-200 m-0" />
                    <button class="btn btn-link btn-sm bg-100 rounded-top-0 px-2 location-by-session-map-zoomOut text-700" type="button"><span class="fas fa-minus fs--1"></span></button>
                </div>
                <div class="table-responsive scrollbar mx-ncard mt-3">
                    <table class="table fs--1 mb-0">
                        <thead class="bg-200 text-800">
                            <tr>
                                <th class="sort" data-sort="country">Location</th>
                                <th class="sort" data-sort="sessions">Sessions</th>
                                <th class="sort" data-sort="users">Users</th>
                                <th class="sort text-end" style="width: 9.625rem;">Percentage</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="table-crm-location-session">
                            <tr>
                                <td class="align-middle py-3"><a href="#!">
                                        <div class="d-flex align-items-center"><img src="../assets/img/crm/india.png" alt="" />
                                            <p class="mb-0 ps-3 country text-700">Abu Dhabi</p>
                                        </div>
                                    </a></td>
                                <td class="align-middle fw-semi-bold sessions">268,663</td>
                                <td class="users align-middle">325,633</td>
                                <td class="align-middle pe-x1">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <p class="mb-0 me-2">89%</p>
                                        <div class="progress rounded-3 bg-200" style="height: 0.3125rem;width:3.8rem">
                                            <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 89%;" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle py-3"><a href="#!">
                                        <div class="d-flex align-items-center"><img src="../assets/img/crm/uae.png" alt="" />
                                            <p class="mb-0 ps-3 country text-700">Dubai</p>
                                        </div>
                                    </a></td>
                                <td class="align-middle fw-semi-bold sessions">250,663</td>
                                <td class="users align-middle">525,633</td>
                                <td class="align-middle pe-x1">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <p class="mb-0 me-2">62%</p>
                                        <div class="progress rounded-3 bg-200" style="height: 0.3125rem;width:3.8rem">
                                            <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 62%;" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle py-3"><a href="#!">
                                        <div class="d-flex align-items-center"><img src="../assets/img/crm/nepal.png" alt="" />
                                            <p class="mb-0 ps-3 country text-700">Sharjah</p>
                                        </div>
                                    </a></td>
                                <td class="align-middle fw-semi-bold sessions">268,663</td>
                                <td class="users align-middle">325,633</td>
                                <td class="align-middle pe-x1">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <p class="mb-0 me-2">50%</p>
                                        <div class="progress rounded-3 bg-200" style="height: 0.3125rem;width:3.8rem">
                                            <div class="progress-bar bg-primary rounded-pill" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-end p-0">
                <div class="pagination d-none"></div>
                <p class="mb-0 fs--1 px-x1"><span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info"> </span><span class="d-none d-sm-inline-block me-2">&mdash; </span><a class="btn btn-link btn-sm py-2 px-0" href="#!">View all<span class="fas fa-angle-right ms-1"></span></a></p>
            </div>
        </div>
    </div>

</div>


<script src="{{asset('admin/vendors/rater-js/index.js')}}"></script>


<div class="row">
    <div class="col">
        <div class="card h-lg-100 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive scrollbar">
                    <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                        <thead class="bg-light">
                            <tr class="text-900">
                                <th>Top Businesses</th>
                                <th class="text-center">Reservations</th>
                                <th class="text-center">Favourites</th>
                                <th class="text-end">Views</th>
                                <th class="pe-x1 text-end" style="width: 8rem">Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-bottom border-200">
                                <td>
                                    <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{asset('assets/images/restu-3.jpg')}}" width="60" alt="" />
                                        <div class="flex-1 ms-3">
                                            <h6 class="mb-1 fw-semi-bold text-nowrap"><a class="text-900 stretched-link" href="#!">Mina Brasserie</a></h6>
                                            <p class="fw-semi-bold mb-0 text-500">Dubai</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center fw-semi-bold">26</td>
                                <td class="align-middle text-center fw-semi-bold">31</td>
                                <td class="align-middle text-end fw-semi-bold">1311</td>
                                <td class="align-middle pe-x1">
                                    <div class="d-flex align-items-center">
                                        <div class="d-block" data-rater='{"starSize":18,"step":0.5}'></div>
                                        <div class="fw-semi-bold ms-2">4.7</div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border-bottom border-200">
                                <td>
                                    <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="{{asset('assets/images/restu-3.jpg')}}" width="60" alt="" />
                                        <div class="flex-1 ms-3">
                                            <h6 class="mb-1 fw-semi-bold text-nowrap"><a class="text-900 stretched-link" href="#!">Mina Brasserie</a></h6>
                                            <p class="fw-semi-bold mb-0 text-500">Dubai</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center fw-semi-bold">26</td>
                                <td class="align-middle text-center fw-semi-bold">31</td>
                                <td class="align-middle text-end fw-semi-bold">1311</td>
                                <td class="align-middle pe-x1">
                                    <div class="d-flex align-items-center">
                                        <div class="d-block" data-rater='{"starSize":18,"step":0.5}'></div>
                                        <div class="fw-semi-bold ms-2">4.7</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light py-2">
                <div class="row flex-between-center">
                    <div class="col-auto">
                        <!-- <select class="form-select form-select-sm">
                            <option>Last 7 days</option>
                            <option>Last Month</option>
                            <option>Last Year</option>
                        </select> -->
                    </div>
                    <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="#!">View All</a></div>
                </div>
            </div>
        </div>
    </div>
</div>





<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->
@stop