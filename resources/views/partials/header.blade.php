<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <!-- Logo icon -->
            <b>
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->

                <!-- Light Logo icon -->

            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span>
                         <!-- dark Logo text -->

                <!-- Light Logo text -->
                         <img src="{{URL::to('assets/images/council.png')}}" class="light-logo" alt="homepage" height="70"/></span> </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav mr-auto mt-md-0">

            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->
        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">


            <!-- ============================================================== -->
            <!-- End Comment -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Messages -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">

            </li>
            @if(auth()->user()->access==\App\AppConstants::ACCESS_RESIDENT)
            {{\App\ResidentAccount::where('res_id',auth()->user()->res_id)->first()->balance}} Litres
            @endif


            <!-- ============================================================== -->
            <!-- End Messages -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{URL::to('assets/images/user.png')}}" alt="user" class="profile-pic" /></a>
                <div class="dropdown-menu dropdown-menu-right scale-up">
                    <ul class="dropdown-user">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-img"><img src="{{URL::to('assets/images/user.png')}}" alt="user"></div>
                                <div class="u-text">
                                    <h4>{{auth()->user()->name}}</h4>

                            </div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('change_password')}}"><i class="ti-user"></i> Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </li>
            <!-- ============================================================== -->
            <!-- Language -->
            <!-- ============================================================== -->

        </ul>
    </div>
</nav>
