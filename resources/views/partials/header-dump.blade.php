<header class="front animated fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 align-self-center">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img class="img-fluid" src="{{asset('assets/images/logo-light.png')}}">
                    </a>
                </div>

                <!-- <span class="hide-desk">
                    <li class="lang">
                        <a href="#" target="_self">العربية</a>
                    </li>
                </span>
                <span class="hide-mob">
                    <div class="location-select-bg">
                        <i class="fa fa-map-marker"></i>
                        <select name="City" id="City" class="location-select-item" required="">
                            <option value="">All Emirates</option>
                            @foreach(emirates() as $emirate)
                            <option value="{{$emirate->id}}">{{$emirate->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </span> -->
                <button class="menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
            <div class="col-lg-8 col-12">
                <span class="hide-desk mob-bar">
                    <!-- <div class="location-select-bg">
                        <i class="fa fa-map-marker"></i>
                        <select name="City" id="City" class="location-select-item" required="">
                            <option value="">All Emirates</option>
                            @foreach(emirates() as $emirate)
                            <option value="{{$emirate->id}}" selected>{{$emirate->name}}</option>
                            @endforeach
                        </select>
                    </div> -->

                    <li class="sign-up">
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url(get_user_dashboard()) }}"><i class="fa fa-user-o"></i> Account</a>
                        @else
                        <a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Sign In or Register</a>
                        @endauth
                        @endif
                    </li>
                </span>
                <div class="main-menu">
                    <nav class="menu">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                <img class="img-fluid m-auto" src="{{asset('assets/images/logo-dark.png')}}">
                            </a>
                        </div>
                        <ul class="menu__list ">
                            <!-- @if($types = get_business_types())
                            @foreach($types as $type)
                            <li class="menu__item menu__item--play">
                                <a href="{{route('restaurants-listing')}}" target="_self" class="menu__link">{{$type->title}}</a>
                            </li>
                            @endforeach
                            @endif
                            <li class="menu__item menu__item--play">
                                <a href="{{route('activities-attraction')}}" target="_self" class="menu__link">Activities &amp; Attractions</a>
                            </li> -->


                            <li class="sign-up">
                                @if (Route::has('login'))
                                @auth
                                <a href="{{ url(get_user_dashboard()) }}"><i class="fa fa-user-o"></i> Account</a>
                                @else
                                <a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Sign In or Register</a>
                                @endauth
                                @endif
                            </li>

                            <!-- <li class="lang">
                                <a href="#" target="_self">العربية</a>
                            </li> -->


                        </ul>
                        <!-- <div class="social-icons-mob d-xs-block">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                            <a href="javascript:;" class="btn lang-change language-toggle" data-href="ar">العربية</a>
                        </div> -->
                    </nav>
                </div>

            </div>
        </div>
    </div>
</header>