<!--load page-->
<div class="load-page">
    <div class="sk-wave">
        <div class="sk-rect sk-rect1"></div>
        <div class="sk-rect sk-rect2"></div>
        <div class="sk-rect sk-rect3"></div>
        <div class="sk-rect sk-rect4"></div>
        <div class="sk-rect sk-rect5"></div>
    </div>
</div>

<!-- Mobile nav -->
<nav class="visible-sm visible-xs mobile-menu-container mobile-nav">
    <div class="menu-mobile-nav navbar-toggle">
        <span class="icon-bar"><i class="fa fa-bars" aria-hidden="true"></i></span>
    </div>
    <div id="cssmenu" class="animated">
        <div class="uni-icons-close"><i class="fa fa-times" aria-hidden="true"></i></div>
        <ul class="nav navbar-nav animated">
            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li><a href="{{ url('/about') }}">About</a></li>
                                            <li><a href="{{ url('/hospitals') }}">Hospitals</a></li>
                                            <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</nav>
<!-- End mobile menu -->

<div class="uni-home-3">
    <div id="wrapper-container" class="site-wrapper-container">
        <header>
            <div class="uni-medicare-header sticky-menu">
                <div class="uni-header-top">
                    <div class="container">
                        <div class="uni-header-top-left">
                            <!--LOGO-->
                            <div class="wrapper-logo">
                                <a class="logo-default" href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo2.png') }}" style="width :120px;" alt="" class="img-responsive"></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="uni-header-top-right">
                            <ul>
                                @php
                                    $quires = App\Models\Query::latest()->limit(1)->get();
                                @endphp
                                @foreach($quires as $item)
                                <li>
                                    <div class="uni-header-top-icons">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <div class="uni-header-top-text">
                                        <span>contact Us</span>
                                        <h4> {{ $item->address }}</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <div class="uni-header-top-icons">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                    </div>
                                    <div class="uni-header-top-text">
                                        <span>Call us</span>
                                        <h4>(965) {{ $item->phone }}</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                <li>
                                    <div class="uni-header-top-icons">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="uni-header-top-text">
                                        <span>Send a message</span>
                                        <h4>{{ $item->email }}</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="uni-medicare-header-main-home-3">
                    <div class="container">
                        <div class="uni-medicare-header-main">
                            <!--MENU TEXT-->
                            <div class="uni-main-menu">
                                <nav class="main-navigation uni-menu-text">
                                    <div class="cssmenu">
                                        <ul>
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li><a href="{{ url('/about') }}">About</a></li>
                                            <li><a href="{{ url('/hospitals') }}">Hospitals</a></li>
                                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                            <!--SEARCH-->
                            <div class="uni-search-yop-home-3">
                                <div id="custom-search-input">
                                    <form method="post" action= "{{ route('search') }}">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <input type="text" name="search" class="search-query form-control" placeholder="Key Word ... " required>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-search"><span class=" glyphicon glyphicon-search"></span></button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--SHORTCODE-->
                            <div class="show-hover-shortcodes animated">
                                <div class="short-code-title">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4>SHORT CODE 1</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>SHORT CODE 2</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>SHORT CODE 3</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h4>SHORT CODE 4</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="short-code-content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul>
                                                <li><a href="07_01_buttons.html"><i class="fa fa-plus-square" aria-hidden="true"></i>Buttons</a></li>
                                                <li><a href="07_02_icons_box.html"><i class="fa fa-cube" aria-hidden="true"></i>Icon Box</a></li>
                                                <li><a href="07_03_progress.html"><i class="fa fa-tasks" aria-hidden="true"></i>Process Bar</a></li>
                                                <li><a href="07_04_tabs.html"><i class="fa fa-columns" aria-hidden="true"></i>Tabs</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul>
                                                <li><a href="07_05_accordion.html"><i class="fa fa-list" aria-hidden="true"></i>Accordion</a></li>
                                                <li><a href="07_06_counter.html"><i class="fa fa-tachometer" aria-hidden="true"></i>Counter</a></li>
                                                <li><a href="07_07_testimonials.html"><i class="fa fa-comments-o" aria-hidden="true"></i>Testimonials</a></li>
                                                <li><a href="07_08_typography.html"><i class="fa fa-text-width" aria-hidden="true"></i>Typography</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul>
                                                <li><a href="07_09_partner.html"><i class="fa fa-handshake-o" aria-hidden="true"></i> Partner</a></li>
                                                <li><a href="07_10_team.html"><i class="fa fa-users" aria-hidden="true"></i> Team</a></li>
                                                <li><a href="07_11_item_list.html"><i class="fa fa-list-ol" aria-hidden="true"></i> Item List</a></li>
                                                <li><a href="07_12_divider.html"><i class="fa fa-chain-broken" aria-hidden="true"></i>Dividers</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul>
                                                <li><a href="07_13_columns.html"><i class="fa fa-bar-chart" aria-hidden="true"></i> Columns</a></li>
                                                <li><a href="07_14_pricing_table.html"><i class="fa fa-address-card-o" aria-hidden="true"></i> Pricing table</a></li>
                                                <li><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 404 Pages</a></li>
                                                <li><a href="#"><i class="fa fa-repeat" aria-hidden="true"></i> Comming soon</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--END SHORTCODE-->
                        </div>
                    </div>
                </div>
            </div>
        </header>