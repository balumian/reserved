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
                    <a class="nav-link {{ (request()->is('business/dashboard')) ? 'active' : '' }}" href="{{route('business.dashboard')}}" role="button">
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
                    <!-- Business--><a class="nav-link dropdown-indicator" href="#business" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="business">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-business-time"></span></span><span class="nav-link-text ps-1">Business Setup</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="business">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('business/profile')) ? 'active' : '' }}" href="{{route('business.profile')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Business Profile</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                        <!-- <li class="nav-item"><a class="nav-link {{ (request()->is('business/capacity*')) ? 'active' : '' }}" href="{{route('business.capacity')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Booking Capacity</span>
                                </div>
                            </a>
                        </li> -->
                        <li class="nav-item"><a class="nav-link {{ (request()->is('business/opening*')) ? 'active' : '' }}" href="{{route('business.opening')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Opening & Closing</span>
                                </div>
                            </a>
                            <!-- more inner pages-->
                        </li>
                    </ul>
                    <!-- Menus--><a class="nav-link dropdown-indicator" href="#menu" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="menu">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-utensils"></span></span><span class="nav-link-text ps-1">Menu</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="menu">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('business/menu/group*')) ? 'active' : '' }}" href="{{route('business.menu.groups')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Menu Groups</span>
                                </div>
                            </a>
                            <!-- Menu Groups-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('business/menus*')) ? 'active' : '' }}" href="{{route('business.menus')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Menus</span>
                                </div>
                            </a>
                            <!-- Menus-->
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <!-- Tables--><a class="nav-link dropdown-indicator" href="#tables" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chair"></span></span><span class="nav-link-text ps-1">Tables</span>
                        </div>
                    </a>

                    <ul class="nav collapse" id="tables">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('business/table/create')) ? 'active' : '' }}" href="{{route('business.tables.create')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                            <!-- New Table-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('business/tables*')) ? 'active' : '' }}" href="{{route('business.tables')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Tables</span>
                                </div>
                            </a>
                            <!-- Table List-->
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <!-- Reservations--><a class="nav-link dropdown-indicator" href="#reservation" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="reservation">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-ticket-alt"></span></span><span class="nav-link-text ps-1">Reservations</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="reservation">
                        <li class="nav-item"><a class="nav-link " href="#">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                            <!-- New Reservation-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Reservations</span>
                                </div>
                            </a>
                            <!-- Reservation List-->
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <!-- offers--><a class="nav-link dropdown-indicator" href="#offers" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="offers">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-gifts"></span></span><span class="nav-link-text ps-1">Perks & Offers</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="offers">
                        <li class="nav-item"><a class="nav-link {{ (request()->is('business/perk/create')) ? 'active' : '' }}" href="{{route('business.perks.create')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New</span>
                                </div>
                            </a>
                            <!-- New offers-->
                        </li>
                        <li class="nav-item"><a class="nav-link {{ (request()->is('business/perks*')) ? 'active' : '' }}" href="{{route('business.perks')}}">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Perk & Offers</span>
                                </div>
                            </a>
                            <!-- offers List-->
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Promote
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- promote--><a class="nav-link dropdown-indicator" href="#promote" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="promote">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-bullhorn"></span></span><span class="nav-link-text ps-1">Promotions</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="promote">
                        <li class="nav-item"><a class="nav-link" href="#">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">New Promotion</span>
                                </div>
                            </a>
                            <!-- New offers-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Promotions</span>
                                </div>
                            </a>
                            <!-- offers List-->
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <!-- label-->
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">CRM
                        </div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <!-- customers--><a class="nav-link dropdown-indicator" href="#customers" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="customers">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Customers</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="customers">
                        <li class="nav-item"><a class="nav-link" href="#">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customers</span>
                                </div>
                            </a>
                            <!-- New offers-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">
                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Offers</span>
                                </div>
                            </a>
                            <!-- offers List-->
                        </li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>