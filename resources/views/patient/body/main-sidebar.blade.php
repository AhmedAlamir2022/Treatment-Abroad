<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Treatment Abroad System </li>
                    
                    
                    <!-- Complaints-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Complaints">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">Complaints</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Complaints" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('my.complaints')}}">My Complaints</a></li>
                        </ul>
                    </li>
                    <!-- Doucments-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Doucments">
                            <div class="pull-left"><i class="fa fa-book"></i><span
                                    class="right-nav-text">Doucments</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Doucments" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Doucments.index')}}">Patient Doucments</a></li>
                        </ul>
                    </li>

                    <!-- Tests -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Tests">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">Tests </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Tests" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('patient.tests')}}">My Tests</a></li>
                        </ul>
                    </li>
                    <!-- Requests-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Reuests">
                            <div class="pull-left"><i class="fa fa-question"></i><span
                                    class="right-nav-text">Requests</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Reuests" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('patient.request')}}">My Requests </a></li>
                        </ul>
                    </li>
                    

                    <!-- Testimonials-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Testimonials">
                            <div class="pull-left"><i class="fa fa-question"></i><span
                                    class="right-nav-text">My Testimonials</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Testimonials" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('user.testimoinals') }}">My Testimonials </a></li>
                        </ul>
                    </li>
                    
                     
                   
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Settings</li>
                    <!-- Profile-->
                    <li>
                        <a href="{{ route('user.profile') }}"><i class="ti-user"></i><span class="right-nav-text">Profile</span></a>
                    </li>
                    <!-- Change Password-->
                    <li>
                        <a href="{{ route('user.change.password') }}"><i class="ti-settings"></i><span class="right-nav-text">Change Password</span></a>
                    </li>
                    <!-- Logout-->
                    <li>
                        <a class="dropdown-item" href="{{ route('user.logout') }}" ><i class="text-info ti-lock"></i>Logout</a>  
                    </li>
                    <br><hr>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================