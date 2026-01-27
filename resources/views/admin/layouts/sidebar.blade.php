<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">

            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

        </div><a class="navbar-brand" href="{{route('admin.dashboard')}}">
            <div class="d-flex align-items-center py-3"><img class="me-2" src="{{asset('assets/images/rest-logo.jpg')}}" alt="" width="35" /><span class="font-sans-serif" style="color: black;">Reserved</span>
            </div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{route('admin.dashboard')}}" role="button">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span>
                        </div>
                    </a>
                    <!-- parent pages-->
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Manage
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- Users--><a class="nav-link dropdown-indicator" href="#customers" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="customers">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Users</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="customers">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/new-customer')) ? 'active' : '' }}" href="{{route('customer.add')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/customers-list')) ? 'active' : '' }}" href="{{route('customer.list')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Users List</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>

                    </ul>
                    <!-- Business--><a class="nav-link dropdown-indicator" href="#business" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="business">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-briefcase"></span></span><span class="nav-link-text ps-1">Business</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="business">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/business/create')) ? 'active' : '' }}" href="{{route('admin.business.create')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add Business</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/businesses*')) ? 'active' : '' }}" href="{{route('admin.business')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Business List</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                       <!-- Business Setup--><a class="nav-link dropdown-indicator" href="#business-setup" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="business-setup">
                       <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-business-time"></span></span><span class="nav-link-text ps-1">Business Setup</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="business-setup">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/business-package*')) ? 'active' : '' }}" href="{{route('admin.business.package')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Business Packages</span>
                                </div>
                            </a>
                            <!-- Business Packages-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/business-type*')) ? 'active' : '' }}" href="{{route('admin.business.type')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Business Types</span>
                                </div>
                            </a>
                            <!-- Business Types-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/cuisines*')) ? 'active' : '' }}" href="{{route('admin.cuisines')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Cuisines</span>
                                </div>
                            </a>
                            <!-- Cuisines-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/themes*')) ? 'active' : '' }}" href="{{route('admin.themes')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Themes</span>
                                </div>
                            </a>
                            <!-- Themes-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/amenities*')) ? 'active' : '' }}" href="{{route('admin.amenities')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Amenities</span>
                                </div>
                            </a>
                            <!-- Amenities-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/experience*')) ? 'active' : '' }}" href="{{route('admin.experience')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Experiences</span>
                                </div>
                            </a>
                            <!-- Experiences-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/feature*')) ? 'active' : '' }}" href="{{route('admin.feature')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Special Features</span>
                                </div>
                            </a>
                            <!-- Features-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/menu/category*')) ? 'active' : '' }}" href="{{route('admin.menu.category')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Menu Categories</span>
                                </div>
                            </a>
                            <!-- Menu Cat-->
                        </li>
                    </ul>
                     <!-- Attractions--><a class="nav-link dropdown-indicator" href="#attraction" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="attraction">
                     <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-tasks"></span></span><span class="nav-link-text ps-1">Act & Attractions</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="attraction">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/attraction/create')) ? 'active' : '' }}" href="{{route('admin.attraction.create')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add Attraction</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/attractions*')) ? 'active' : '' }}" href="{{route('admin.attractions')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Attractions List</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>

                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">App
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- parent pages--><a class="nav-link dropdown-indicator" href="#settings" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="settings">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-cog"></span></span><span class="nav-link-text ps-1">Settings</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="settings">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/countr*')) ? 'active' : '' }}" href="{{route('admin.countries')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Countries</span>
                                </div>
                            </a>
                            <!-- Countries-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/emirate*')) ? 'active' : '' }}" href="{{route('admin.emirate')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Emirates</span>
                                </div>
                            </a>
                            <!-- Emirates-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('admin/areas*')) ? 'active' : '' }}" href="{{route('admin.areas')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Areas</span>
                                </div>
                            </a>
                            <!-- Areas-->
                        </li>
                        <!-- <li class="nav-item"><a class="nav-link {{ (request()->is('admin/smtp*')) ? 'active' : '' }}" href="{{route('admin.system.smtp.show')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">SMTP Setting</span>
                                </div>
                            </a>
                        </li> -->
                </li>
            </ul>
        </div>
    </div>
</nav>