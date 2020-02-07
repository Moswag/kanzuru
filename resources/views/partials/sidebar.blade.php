<div class="scroll-sidebar">
    <!-- User profile -->
    <div class="user-profile" style="background: url(assets/images/background/user-info.jpg) no-repeat;">
        <!-- User profile image -->
        <div class="profile-img"> <img src="{{URL::to('assets/images/user.png')}}" alt="user" /> </div>
        <!-- User profile text-->
        <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> {{auth()->user()->name}}</a>
            <div class="dropdown-menu animated flipInY">
                <a href="{{route('change_password')}}" class="dropdown-item"><i class="ti-user"></i> Change Password</a>
                <div class="dropdown-divider"></div> <a href="{{route('logout')}}" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
            </div>
        </div>
    </div>
    <!-- End User profile text-->
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-small-cap">PERSONAL</li>
            @if(auth()->user()->access=='Admin')
            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Admin </span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('add_admin')}}">Add Admin</a></li>
                    <li><a href="{{route('view_admins')}}">View Admins</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Cities </span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('add_city')}}">Add City</a></li>
                    <li><a href="{{route('view_cities')}}">View Cities</a></li>
                </ul>
            </li>


            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Councils</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('add_council')}}">Add Council</a></li>
                    <li><a href="{{route('view_councils')}}">View Councils</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Council Users</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('add_user')}}">Add Council User</a></li>
                    <li><a href="{{route('view_users')}}">View Council Users</a></li>
                </ul>
            </li>
            @elseif(auth()->user()->access=='Council')
                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Location</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('add_location')}}">Add Location</a></li>
                        <li><a href="{{route('view_locations')}}">View Locations</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Residents</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('add_resident')}}">Add Resident</a></li>
                        <li><a href="{{route('view_residents')}}">View Residents</a></li>
                    </ul>
                </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Complaints</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('view_complaints')}}">View Pending Complaints</a></li>
                    <li><a href="{{route('view_solved_complaints')}}">View Solved Complaints</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Reports</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="#">View Reports</a></li>
                </ul>
            </li>
                @else
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Account</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('add_payment')}}">Make Payments</a></li>
                        <li><a href="{{route('view_payments')}}">View Payments</a></li>
                    </ul>
                </li>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Complain</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('complain')}}">Add Complain</a></li>
                        <li><a href="{{route('view_res_complaints')}}">View Complains</a></li>
                    </ul>
                </li>

            @endif

        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
