<footer class="site-footer footer-default">
    <div class="footer-main-content">
        <div class="container">
            <div class="row">
                <div class="footer-main-content-elements">
                    <div class="footer-main-content-element col-md-4 col-sm-6">
                        <aside class="widget">
                            <div class="widget-title uni-uppercase"><a href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo2.png') }}" style="width :150px;" alt="" class="img-responsive"></a></div>
                            <div class="widget-content">
                                <p>
                                    Pellentesque habitant morbi tristique senectus et netus et malesuada fame ac
                                    turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget.
                                </p>
                                <div class="uni-info-contact">
                                    <ul>
                                        @php
                                            $quires = App\Models\Query::latest()->limit(1)->get();
                                        @endphp
                                        @foreach($quires as $item)
                                        <li> <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $item->address }}</li>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> (965) {{ $item->phone }}</li>
                                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $item->email }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="footer-main-content-element col-md-4 col-sm-6">
                        <aside class="widget">
                            <h3 class="widget-title uni-uppercase">quick links</h3>
                            <div class="widget-content">
                                <div class="uni-quick-link">
                                    <ul>
                                        <li><a href="{{ route('login_form') }}" target="_blank"><span>+</span> Admin Login</a></li>
                                        <li><a href="{{ route('ndoctor_form') }}" target="_blank"><span>+</span> NDoctor Login</a></li>
                                        <li><a href="{{ route('fdoctor_form') }}" target="_blank"><span>+</span> FDoctor Login</a></li>
                                        <li><a href="{{ route('login') }}" target="_blank"><span>+</span> Patient Login</a></li>
                                    </ul>
                                </div>
                            </div>
                        </aside>
                    </div>
                    <div class="footer-main-content-element col-md-4 col-sm-6">
                        <aside class="widget">
                            <h3 class="widget-title uni-uppercase">News<span>letter</span></h3>
                            <div class="widget-content">
                                <div class="uni-footer-newletter">
                                    <form method="post" action= "{{ route('store.sub') }}">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your email here..." required>
                                            <button type="submit" class="btn btn-sub">subscribe</button>
                                        </div>
                                    </form>
                                    
                                        
                                    
                                    <div class="uni-social">
                                        <h4>Follow us</h4>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>