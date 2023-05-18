@extends('frontend.body.master')

@section('title')
     Contact
@stop
@section('frontend')

<section class="site-content-area">

    <div class="uni-banner-default uni-background-1">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>Contact us</h1>
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">home</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>

    <div class="uni-contact-us-body">

        <div class="uni-contact-us-body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="uni-send-a-message">
                            <div class="uni-contact-title">
                                <h3>Send a message</h3>
                                <div class="uni-line"></div>
                            </div>
                            <div class="uni-send-a-message-body">
                                <form method="POST" action="{{ route('store.message') }}">
                                    @csrf
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" placeholder="your name" required>
                                    </div>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="phone" placeholder="phone number" required>
                                    </div>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        <input type="email" class="form-control" name="email" placeholder="email" required>
                                    </div>
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-question" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="subject" placeholder="subject" required>
                                    </div>
                                    <div class="input-group form-group">
                                        <textarea id="message" name="message" class="form-control" placeholder="message" required></textarea>
                                    </div>

                                    <button type="submit" class="vk-btn vk-btn-send">send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="uni-contact-info">
                            <div class="uni-contact-title">
                                <h3>Contact us</h3>
                                <div class="uni-line"></div>
                            </div>
                            @php
                                $quires = App\Models\Query::latest()->limit(1)->get();
                            @endphp
                            @foreach($quires as $item)
                            <div class="uni-contact-info-body">
                                <div class="item">
                                    <div class="icon-holder">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    </div>
                                    <div class="text-holder">
                                        <p>Visit Us</p>
                                        <span>{{ $item->address }}</span>
                                    </div>
                                </div>

                                <!--Receive records-->
                                <div class="uni-receive-records">
                                    <div class="uni-contact-info-title">
                                        <h4>Receive records</h4>
                                        <div class="uni-divider"></div>
                                    </div>

                                    <div class="item">
                                        <div class="icon-holder">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-holder">
                                            <p>Call Us</p>
                                            <span>(965) {{ $item->phone }}</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon-holder">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-holder">
                                            <p>Send A Message</p>
                                            <span>{{ $item->email }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!--customer care-->
                                <div class="uni-customer-care">
                                    <div class="uni-contact-info-title">
                                        <h4>customer care</h4>
                                        <div class="uni-divider"></div>
                                    </div>

                                    <div class="item">
                                        <div class="icon-holder">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-holder">
                                            <p>Call Us</p>
                                            <span>(965) {{ $item->phone }}</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon-holder">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                        </div>
                                        <div class="text-holder">
                                            <p>Send A Message</p>
                                            <span>{{ $item->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="uni-contact-us-hours">
                            <div class="uni-contact-us-title">
                                <div class="icon">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                </div>
                                <h4>opening hours</h4>
                            </div>
                            <div class="uni-contact-us-hours-content">
                                <table class="table">
                                    <tr>
                                        <td>monday</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                    <tr>
                                        <td>tuesday</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                    <tr>
                                        <td>wednesday</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                    <tr>
                                        <td>thursday</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                    <tr>
                                        <td>friday</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                    <tr>
                                        <td>sunday</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>


@endsection