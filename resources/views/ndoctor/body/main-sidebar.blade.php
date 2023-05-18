<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('ndoctor.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Treatment Abroad System </li>
                    
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#doucments">
                            <div class="pull-left"><i class="fa fa-book"></i><span
                                    class="right-nav-text">Patients Doucments</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="doucments" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('doctor.doucments') }}">Doucments List</a></li>
                        </ul>
                    </li>
                    <!-- Complaints -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Complaints">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">Complaints </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Complaints" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('doctor.complaints') }}">Complaints  List</a></li>
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
                            <li><a href="{{ route('doctor.tests') }}">Tests List</a></li>
                        </ul>
                    </li>

                    <!-- Requests -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Requests">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">Requests </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Requests" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('ndoctor.requests') }}">Requests List</a></li>
                        </ul>
                    </li>

                    <!-- Reports -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Reports">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">Reports </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Reports" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('ndoctor.reports') }}">Reports List</a></li>
                        </ul>
                    </li>
                   
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Settings</li>
                    <!-- Profile-->
                    <li>
                        <a href="{{ route('ndoctor.profile') }}"><i class="ti-user"></i><span class="right-nav-text">Profile</span></a>
                    </li>
                    <!-- Change Password-->
                    <li>
                        <a href="{{ route('change.ndpassword') }}"><i class="ti-settings"></i><span class="right-nav-text">Change Password</span></a>
                    </li>
                    <!-- Logout-->
                    <li>
                        <a class="dropdown-item" href="{{ route('ndoctor.logout') }}" ><i class="text-info ti-lock"></i>Logout</a>  
                    </li>
                    <br><hr>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================