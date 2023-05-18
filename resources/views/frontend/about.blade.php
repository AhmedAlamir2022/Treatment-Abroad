@extends('frontend.body.master')

@section('title')
     About
@stop
@section('frontend')
            <section class="site-content-area">

                <div class="uni-banner-default uni-background-1">
                    <div class="container">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="page-title-inner">
                                <h1>about</h1>
                            </div>
                        </div>
                        <!-- End page title -->

                        <!-- Breadcrumbs -->
                        <ul class="breadcrumbs">
                            <li><a href="{{ url('/') }}">home</a></li>
                            <li><a href="">about</a></li>
                        </ul>
                        <!-- End breadcrumbs -->
                    </div>
                </div>

                <div class="uni-about-body">

                    <!--WHO WE ARE-->
                    <div class="uni-about-who-are-you">
                        <div class="container">
                            <div class="uni-services-title">
                                <h3>who we are</h3>
                                <div class="uni-underline"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="uni-about-who-are-you-left">
                                        <img src="{{ asset('frontend/images/about/img.jpg')}}" alt="" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="uni-about-who-are-you-right">
                                        
                                        <h4>suggested Solution</h4>
                                        <p>
                                            Developing a website to provide services to those eligible for treatment abroad.
                                            One of the benefits of this site is to avoid intermediaries and to take every person his right to treatment. 
                                            If there is a person whose treatment is in Kuwait, it is not approved by the authority and the way this site works is to put all your official papers, which are medical reports and copies of official documents, the most important of which is the expiry date of the passport if its duration is less than six Months will be rejected, and after the patient is approved by the committee, the approval will be sent to him to start the procedures for traveling abroad. 
                                            The hospital in which the patient receives treatment is determined through specialists. 
                                            There is also an evaluation of the hospital from previous patients in terms of recovery and services provided, and after sending the patient abroad to receive Treatment The body follows up the stages of the patient’s recovery and also the patient can speak to the members of the body if there is any problem in the treatment procedures and after the completion of the treatment, the patient evaluates the hospital in terms of the duration of treatment and the services provided
                                            
                                        </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Team 2-->
                    <div class="uni-shortcode-team-2 uni-background-2">
                        <div class="container">
                            <div class="uni-services-title">
                                <h3>Our Forgin doctor</h3>
                                <div class="uni-underline"></div>
                            </div>
                            <div class="uni-owl-four-item owl-carousel owl-theme">
                                @php
									$doctors = App\Models\FDoctor::latest()->get();
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
                                                    <img src="images/icons_box/icon_4/icon-5.png" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9 col-xs-9 uni-clear-padding">
                                                <div class="item-title">
                                                    <a href="{{ route('fdoctor.details',$item->id) }}"><h4>{{$item->name}}</h4></a> 
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

                    <!--ICONS BOX 3-->
                    <div class="uni-shortcode-icons-box-3">
                        <div class="container">
                            <div class="row">
                                @php
									$Features = App\Models\Feature::latest()->get();
								@endphp
								@foreach($Features as $item)
                                <div class="col-md-4">
                                    <div class="uni-shortcode-icons-box-3-default">
                                        <div class="item-icons">
                                            <img src="{{ asset($item->image) }}" style="width: 60px; height: 50px;" alt="Feature Image">
                                        </div>
                                        <div class="item-caption">
                                            <h4>
                                                {{ $item->name }}
                                            </h4>
                                            <div class="uni-line"></div>
                                            <p>
                                                {{ $item->details }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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


                   


                </div>

            </section>
            @endsection