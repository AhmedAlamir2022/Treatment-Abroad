<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('fdoctor.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Treatment Abroad System </li>
                    
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Requetss">
                            <div class="pull-left"><i class="fa fa-book"></i><span
                                    class="right-nav-text">Patients Requests</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Requetss" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('fdoctor.requests') }}">Requests List</a></li>
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
                            <li><a href="{{ route('fdoctor.reports') }}">Reports  List</a></li>
                        </ul>
                    </li>
                   
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Settings</li>
                    <!-- Profile-->
                    <li>
                        <a href="{{ route('fdoctor.profile') }}"><i class="ti-user"></i><span class="right-nav-text">Profile</span></a>
                    </li>
                    <!-- Change Password-->
                    <li>
                        <a href="{{ route('change.fdpassword') }}"><i class="ti-settings"></i><span class="right-nav-text">Change Password</span></a>
                    </li>
                    <!-- Logout-->
                    <li>
                        <a class="dropdown-item" href="{{ route('fdoctor.logout') }}" ><i class="text-info ti-lock"></i>Logout</a>  
                    </li>
                    <br><hr>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================