<div class="col-lg-3 col-12">
    <div class="sidebar-bg  animated fadeIn">
        <div class="sidebar">
            <div class="mob-heading-sidebar">
                <a class="lg-hidden d-flex justify-content-between" data-bs-toggle="collapse" href="#my-side-menu"
                    role="button" aria-expanded="false" aria-controls="my-side-menu">
                    <h2>Menu <i class="fa fa-bars"></i></h2>
                </a>
            </div>
            <ul class="collapse" id="my-side-menu">

                <li class="side-nav-item {{ (request()->is('reservations')) ? 'active' : '' }}">
                    <a href="{{route('reservations')}}">
                        Reservations {{Request::is(route('reservations'))}}
                    </a>
                </li>

                <li class="side-nav-item {{ (request()->is('reviews')) ? 'active' : '' }}">
                    <a href="{{route('reviews')}}">
                        My Reviews
                    </a>
                </li>

                <li class="side-nav-item {{ (request()->is('favourites')) ? 'active' : '' }}">
                    <a href="{{route('favourites')}}">
                        Favorites
                    </a>
                </li>

                <li class="side-nav-item {{ (request()->is('offers')) ? 'active' : '' }}">
                    <a href="{{route('offers')}}">
                        Special Offers/Perks
                    </a>
                </li>

                <li class="side-nav-item {{ (request()->is('interests')) ? 'active' : '' }}">
                    <a href="{{route('interests')}}">
                        My Intrests
                    </a>
                </li>

                <li class="side-nav-item {{ (request()->is('profile')) ? 'active' : '' }}">
                    <a href="{{route('profile')}}">
                        Profile
                    </a>
                </li>

                <li class="side-nav-item last-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a>
                        <button type="submit">
                            Logout
                        </button>
                        </a>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</div>