@extends('frontend.body.master')

@section('title')
     Home
@stop
@section('frontend')

 
            <section class="site-content-area">

                <!--BANNER-->
                <div class="uni-banner">
                    <div class="uni-owl-one-item owl-carousel owl-theme">
                        <div class="item">
                            <div class="uni-banner-img uni-background-7"></div>
                            <div class="content animated" data-animation="flipInX" data-delay="0.9s">
                                <div class="container">
                                    <div class="caption">
                                        <h1>Let us protect your health</h1>
                                        <p>
                                            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                            <br>
                                            Donec eu libero sit amet quam egestas semper.
                                        </p>
                                        <a href="#">our services</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="uni-banner-img uni-background-6"></div>
                            <div class="content animated" data-animation="flipInX" data-delay="0.9s">
                                <div class="container">
                                    <div class="caption">
                                        <h1>Let us protect your health</h1>
                                        <p>
                                            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                            <br>
                                            Donec eu libero sit amet quam egestas semper.
                                        </p>
                                        <a href="#">our services</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="uni-banner-img uni-background-5"></div>
                            <div class="content animated" data-animation="flipInX" data-delay="0.9s">
                                <div class="container">
                                    <div class="caption">
                                        <h1>Let us protect your health</h1>
                                        <p>
                                            Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.
                                            <br>
                                            Donec eu libero sit amet quam egestas semper.
                                        </p>
                                        <a href="#">our services</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--HOME 2 ICONS BOX-->
                <div class="uni-home-2-icons-box">
                    <div class="uni-shortcode-icons-box-2">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3 uni-clear-padding">
                                    <div class="uni-shortcode-icons-box-2-default uni-background-blue">
                                        <div class="item-icons">
                                            <i class="fa fa-user-md" aria-hidden="true"></i>
                                        </div>
                                        <div class="item-caption">
                                            <h4>
                                                Qualified Doctors
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 uni-clear-padding">
                                    <div class="uni-shortcode-icons-box-2-default uni-background-blue-blur">
                                        <div class="item-icons">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="item-caption">
                                            <h4>
                                                24 hours service
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 uni-clear-padding">
                                    <div class="uni-shortcode-icons-box-2-default uni-background-blue">
                                        <div class="item-icons">
                                            <i class="fa fa-hospital-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="item-caption">
                                            <h4>
                                                modern equipment
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 uni-clear-padding">
                                    <div class="uni-shortcode-icons-box-2-default uni-background-blue-blur">
                                        <div class="item-icons">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="item-caption">
                                            <h4>
                                                conscientious Doctors
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--HOME 2 OURSERVICES-->
                <div class="uni-home-our-services">
                    <div class="uni-shortcode-icons-box-5">
                        <div class="container">

                            <div class="uni-home-title">
                                <h3>Our Features</h3>
                                <div class="uni-underline"></div>
                            </div>

                            <div class="row">
                                @php
									$Features = App\Models\Feature::latest()->get();
								@endphp
								@foreach($Features as $item)
                                <div class="col-md-4 col-sm-6">
                                    <div class="uni-shortcode-icons-box-5-default">
                                        <div class="item-icons-title">
                                            <div class="col-md-4 uni-clear-padding">
                                                <div class="item-icons">
                                                    <img src="{{ asset($item->image) }}" style="width: 60px; height: 50px;" alt="Feature Image">
                                                </div>
                                            </div>
                                            <div class="col-md-8 uni-clear-padding">
                                                <div class="item-title">
                                                    <h4>{{ $item->name }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-caption">
                                            <p>
                                                {{ $item->details }}
                                            </p>
                                            <a href="{{ url('/about') }}" class="readmore">Read more</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

                

                <!--HOME 2 COUNTER-->
                <div class="uni-home-2-counter">
                    <div class="uni-shortcode-counter-2 uni-background-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="uni-shortcode-counter-default">
                                        <ul>
                                            <li class="counter-icons"><i class="fa fa-user-md" aria-hidden="true"></i></li>
                                            <li class="counter-number counter"> {{ \App\Models\NDoctor::count() }} </li>
                                            <li class="counter-text">National Doctor</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="uni-shortcode-counter-default">
                                        <ul>
                                            <li class="counter-icons"><i class="fa fa-smile-o" aria-hidden="true"></i></li>
                                            <li class="counter-number counter"> {{ \App\Models\User::count() }} </li>
                                            <li class="counter-text"> Happy Patients</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="uni-shortcode-counter-default">
                                        <ul>
                                            <li class="counter-icons"><i class="fa fa-user-md" aria-hidden="true"></i></li>
                                            <li class="counter-number counter"> {{ \App\Models\FDoctor::count() }} </li>
                                            <li class="counter-text"> Forgin Doctors </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

                <!--OUR DOCTOR-->
                <div class="uni-home-2-our-doctor">
                    <div class="uni-shortcode-team-1">
                        <div class="container">

                            <div class="uni-home-title">
                                <h3>our national doctors</h3>
                                <div class="uni-underline"></div>
                            </div>

                            <div class="uni-owl-four-item owl-carousel owl-theme">
                                @php
									$doctors = App\Models\NDoctor::latest()->get();
								@endphp
								@foreach($doctors as $item)
                                <div class="item">
                                    <div class="uni-team-default">
                                        <div class="item-img">
                                            <img src="{{ asset($item->doctor_image) }}" alt="" class="img-responsive">
                                        </div>
                                        <div class="item-caption">
                                            <div class="col-md-3 col-sm-3 col-xs-3 uni-clear-padding">
                                                <div class="item-icons">
                                                    <img src="{{ asset('frontend/images/icons_box/icon_4/icon-5.png') }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 uni-clear-padding">
                                                <div class="item-title">
                                                    <a href="{{ route('doctor.details',$item->id) }}"><h4>{{$item->name}}</h4></a>
                                                    <span>{{ $item->specializations->name  }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


                <!--BOOK APPOINTMENTS-->
                <div class="uni-home-2-book-appointment uni-background-3">
                    <div class="container">
                        <div class="uni-home-title">
                            <h3>contact Us</h3>
                        </div>
                        <form method="POST" action="{{ route('store.message') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="name" placeholder="your name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        <input type="tel" class="form-control" name="phone" placeholder="phone number" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-question" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group form-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" class="form-control" name="message" placeholder="Message" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="vk-btn vk-btn-send" type="submit">submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--DEPARTMENT, TESTIMONIAL, OPNING HOURES-->
                <div class="uni-services-de-test-hours">
                    <div class="container">
                        <div class="row">

                            <!--TESTIMONIALS-->
                            <div class="col-md-8">
                                <div class="uni-services-testimonials">
                                    <div class="uni-home-title">
                                        <h3>testimonials</h3>
                                        <div class="uni-line"></div>
                                    </div>
                                    <div class="uni-services-testimonials-content">
                                        <div class="uni-owl-one-item owl-carousel owl-theme">
                                            @php
                                                $testimonials = App\Models\Testimonial::latest()->get();
                                            @endphp
                                            @foreach($testimonials as $item)
                                                @if($item->status == '1')
                                            <div class="item">
                                                <div class="uni-shortcode-testimonials-default">
                                                    <div class="item-info">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-3">
                                                                <div class="item-info-img">
                                                                    <img src="{{ URL::asset('upload/user_icon.png') }}" alt="" class="img-responsive">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 col-sm-9">
                                                                <div class="item-info-title">
                                                                    <h4>{{ $item->name }}</h4>
                                                                    <p class="testimonial_subtitle">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                                                </div>
                                                                <div class="uni-divider"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-caption">
                                                        <p>
                                                            {{ $item->testimonial }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--OPENING HOURS-->
                            <div class="col-md-4">
                                <div class="uni-services-opinging-hours">
                                    <div class="uni-services-opinging-hours-title">
                                        <div class="icon">
                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        </div>
                                        <h4>opening hours</h4>
                                    </div>
                                    <div class="uni-services-opinging-hours-content">
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


                


            </section>

       @endsection