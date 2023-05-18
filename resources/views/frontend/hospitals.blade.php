@extends('frontend.body.master')

@section('title')
     Hospitals
@stop
@section('frontend')

<section class="site-content-area">

    <div class="uni-banner-default uni-background-1">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>our Hospitals</h1>
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">home</a></li>
                <li><a href="#">our Hospitals</a></li>
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>


    <div class="uni-our-doctor-body">
        <div class="container">
            <div class="uni-shortcode-tabs-default">
                <div class="uni-shortcode-tab-2">
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="#tab_default_1" data-toggle="tab" aria-expanded="false">
                                        All </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_default_1">
                                    <div class="row">
                                        @php
                                            $hospitals = App\Models\Hospital::latest()->get();
                                        @endphp
                                        @foreach($hospitals as $item)
                                        <div class="col-md-3 col-sm-6">
                                            <div class="uni-our-doctor-item-default">
                                                <div class="item-img">
                                                    <a href="{{ route('hospital.details',$item->id) }}"><img src="{{ asset($item->image1) }}" alt="" class="img-responsive"></a>
                                                </div>
                                                <div class="item-caption">
                                                    <div class="item-caption-head">
                                                        <div class="col-md-3 col-sm-3 col-xs-3 uni-clear-padding">
                                                            <div class="item-icons">
                                                                <img src="{{ asset('frontend/images/icons_box/icon_4/icon-5.png') }}" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9 col-sm-9 col-xs-9 uni-clear-padding">
                                                            <div class="item-title">
                                                                <a href="{{ route('hospital.details',$item->id) }}"><h4>{{$item->title}}</h4></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item-caption-info">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td>{{$item->email}}</td>
                                                            </tr>
                                                            </thead>
                                                            <tfoot>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                                        </li>
                                                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection