<div class="scroll-sidebar">
    <!-- User profile -->
    <div class="user-profile" style="background: url(assets/images/background/user-info.jpg) no-repeat;">
        <!-- User profile image -->
        <div class="profile-img"> <img src="{{URL::to('assets/images/user.png')}}" alt="user" /> </div>
        <!-- User profile text-->
        <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{auth()->user()->name}} </a>
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
            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">User </span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('add_user')}}">Add User</a></li>
                    <li><a href="{{route('view_users')}}">View Users</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Residents </span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('add_resident')}}">Add Resident</a></li>
                    <li><a href="{{route('view_residents')}}">View Residents</a></li>
                </ul>
            </li>


            <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Locations</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('add_location')}}">Add Location</a></li>
                    <li><a href="{{route('view_locations')}}">View Locations</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-bullseye"></i><span class="hide-menu">Notify</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{route('add_notification')}}">Notify Residents</a></li>
                    <li><a href="{{route('view_notifications')}}">View Notifications</a></li>
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
                    <li><a href="{{route('report')}}">View Reports</a></li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>