@extends('frontend.body.master')

@section('title')
     Hospital Details
@stop
@section('frontend')

<section class="site-content-area">

    <div class="uni-banner-default uni-background-1">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>Hospital Details</h1>
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">home</a></li>
                <li><a href="#">Hospital Details </a></li>
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>

    <div class="uni-single-departments-body">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="uni-single-departments-left">
                        <!--Opening hours-->
                        <div class="uni-single-department-open-hours">
                            <h3 class="uni-single-department-left-title">
                                Opening hours
                            </h3>
                            <div class="uni-single-department-left-table">
                                <table class="table">
                                    <tr>
                                        <td>Monday</td>
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
                                        <td>saturday</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                    <tr>
                                        <td>sunday</td>
                                        <td>8:00 - 17:00</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!--Contact us-->
                        <div class="uni-single-department-contact-info">
                            <h3 class="uni-single-department-left-title">
                                CONTACT INFO
                            </h3>
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{$hospital->address}}
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i> {{$hospital->contact}}
                                </li>
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> {{$hospital->email}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="uni-single-departments-right">

                        <div class="uni-single-departments-cardiology">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{ asset($hospital->image1) }}" alt="" class="img-responsive">
                                </div>
                                <div class="col-md-7">
                                    <h3 class="uni-single-departments-right-title">{{$hospital->title}}</h3>
                                    <p>{{$hospital->short_desc}}</p>
                                </div>
                            </div>
                        </div>

                        <!--TREATMENTS INVENSTIGATION-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="uni-single-departments-treatments-investigation">
                                    <h3 class="uni-single-departments-right-title">Hospital Description</h3>
                                    <div class="uni-divider"></div>
                                    <ul>
                                        <li>
                                            {{$hospital->long_desc}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="uni-single-departments-treatments-investigation">
                                    <h3 class="uni-single-departments-right-title">Address</h3>
                                    <div class="uni-divider"></div>
                                    <ul>
                                        <li>
                                            {{$hospital->Address}}
                                        </li>
                                        <li>
                                            {{$hospital->country}}
                                        </li>
                                        <li>
                                            {{$hospital->city}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        

                        <!--Images-->
                        <div class="uni-single-department-doctor">
                            <h3 class="uni-single-departments-right-title">Hospital Images</h3>
                            <div class="uni-divider"></div>

                            <div class="uni-single-department-doctor-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="uni-single-department-doctor-item">
                                            <div class="item-img">
                                                <img src="{{ asset($hospital->image2) }}" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="uni-single-department-doctor-item">
                                            <div class="item-img">
                                                <img src="{{ asset($hospital->image3) }}" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="uni-single-department-doctor-item">
                                            <div class="item-img">
                                                <img src="{{ asset($hospital->image4) }}" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="uni-single-department-doctor-item">
                                            <div class="item-img">
                                                <img src="{{ asset($hospital->image5) }}" alt="" class="img-responsive">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="woocommerce-tabs wc-tabs-wrapper">
                            <div class="row">
                                <div class="col-md-12" id="logout">
                                    <div class="comment-tabs">
                                        <div class="uni-shortcode-tabs-default">
                                            <div class="uni-shortcode-tab-3">
                                                <div class="tabbable-panel">
                                                    <div class="tabbable-line">
                                                        <div id="comments" class="comments-area">
                                                            <div class="list-comments">
                                                                <h3 class="comments-title"> All Reviews</h3>
                                                                <div class="uni-divider"></div>
                                                                <ul class="comment-list">
                                                                    @php
                                                                        $rates = App\Models\Rate::latest()->limit(20)->get();
                                                                    @endphp
                                                                    @foreach($rates as $item)
                                                                    @if($item->hospital_id == $hospital->id)
                                                                    <li class="comment even thread-even depth-1 description_comment">
                                                                        
                                                                        <div class="comments-img">
                                                                            <img alt="" src="{{ URL::asset('assets/images/user_icon.png') }}" style="width: 60px; height: 50px;" class="avatar avatar-100 photo">
                                                                        </div>
                                                                        <div class="content-comment">
                                                                            <div class="author">
                                                                                <span class="author-name">{{$item->name}}</span>
                                                                                <div class="review-count rating">
                                                                                    <i class="fas fa-star filled">{{$item->rating}} Of 5</i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="message">
                                                                                <p>{{$item->review}}
                                                                                </p>
                                                                            </div>
                                                                            <div class="reply">
                                                                                <span class="comment-extra-info">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                                                <span>
                                                                                    <a rel="nofollow" class="comment-reply-link" href="#">Reply <i class="fa fa-share" aria-hidden="true"></i></a>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                
                                                                        <div class="clear"></div>
                                                                    </li>
                                                                    @endif
                                                                    @endforeach
                                                                </ul>
                
                
                                                            </div>
                
                                                            <div class="form-comment">
                                                                <div id="respond" class="comment-respond">
                                                                    <div class="uni-divider"></div>
                                                                    <div class="row">
                                                                        <div class="uni-single-product-add-your-review">
                                                                        <h3 id="reply-title" class="comment-reply-title"> add your review</h3>
                                                                        
                                                                            <form method="post" action="{{route('Rates.store')}}">
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-2">
                                                                                            <input id="star-1" type="radio" name="rating" value="star-1">
                                                                                            <label for="star-1" title="1 stars">
                                                                                                1 * <i class="active fa fa-star"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <input id="star-2" type="radio" name="rating" value="star-2">
                                                                                            <label for="star-2" title="2 stars">
                                                                                                2 * <i class="active fa fa-star"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <input id="star-3" type="radio" name="rating" value="star-3">
                                                                                            <label for="star-3" title="3 stars">
                                                                                                3 * <i class="active fa fa-star"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <input id="star-4" type="radio" name="rating" value="star-4">
                                                                                            <label for="star-4" title="4 stars">
                                                                                                4 * <i class="active fa fa-star"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <input id="star-5" type="radio" name="rating" value="star-5">
                                                                                            <label for="star-5" title="5 stars">
                                                                                                5 * <i class="active fa fa-star"></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <input type="text" name="name" placeholder="Title" class="form-control" required>
                                                                                            <input class="form-control" type="hidden" name="hospital_id" value="{{$hospital->id}}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <textarea class="form-control" name="review" placeholder="Review" rows="5" required></textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <div class="vk-btn-send">
                                                                                                <button type="submit" class="btn vk-btn-primary">SUBMIT</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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