@extends('frontend.body.master')

@section('title')
     F Doctor Details
@stop
@section('frontend')

<section class="site-content-area">
    <div class="uni-banner-default uni-background-1">
        <div class="container">
            <!-- Page title -->
            <div class="page-title">
                <div class="page-title-inner">
                    <h1>F Doctor Details</h1>
                </div>
            </div>
            <!-- End page title -->

            <!-- Breadcrumbs -->
            <ul class="breadcrumbs">
                <li><a href="{{ url('/') }}">home</a></li>
                <li><a href="">F Doctor Details</a></li>
            </ul>
            <!-- End breadcrumbs -->
        </div>
    </div>

    <div class="uni-about-body">
                    <div class="uni-single-product-body">
                        <div class="container">
                            <div id="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="uni-single-product-right">
                                            <div id="product">
                                                <div class="product-info">
                                                    <div class="row">
                                                        <div class="col-sm-6 left image-panel">
                                                            <div id="carousel" class="flexslider thumbnail_product">
                                                                <div id="slider" class="flexslider">
                                                                    <div class="product-slide">
                                                                        <div class="img-slide">
                                                                            <img class="filter2 animated fadeIn shop1 active img-responsive" src="{{ asset($fdoctors->doctor_image) }}" alt="product2">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 right">
                                                            <h1 class="product_title entry-title">{{$fdoctors->name}}</h1>
                                                            <p class="uni-box-vote">
                                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                                                <span><i class="fa fa-star-o" aria-hidden="true"></i></span>
                                                                <span>({{$fdoctors->email}})</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>{{$fdoctors->address}}</p>
                                                            </div>
                                                            <!-- .description -->

                                                            <div class="product_meta">
                                                                <span class="posted_in">Hospital:
                                                                    <a href="" rel="tag">({{ $fdoctors->hospitals->title }})</a>
                                                                </span>
                                                            </div>
                                                            <div class="product_meta">
                                                                <span class="posted_in">Specialization:
                                                                    <a href="" rel="tag">({{ $fdoctors->specializations->name  }})</a>
                                                                </span>
                                                            </div>
                                                            <div class="product_meta">
                                                                <span class="posted_in">Contact:
                                                                    <a href="" rel="tag">({{$fdoctors->contact}})</a>
                                                                </span>
                                                            </div>
                                                            <div class="product_meta">
                                                                <span class="posted_in">Gender:
                                                                    <a href="" rel="tag">({{$fdoctors->gender}})</a>
                                                                </span>
                                                            </div>

                                                            <div class="product_meta">
                                                                <span class="posted_in">Naionality:
                                                                    <a href="" rel="tag">({{$fdoctors->nationality}})</a>
                                                                </span>
                                                            </div>

                                                            <div class="product_meta">
                                                                <span class="posted_in">Blood Type:
                                                                    <a href="" rel="tag">({{$fdoctors->bloodtype}})</a>
                                                                </span>
                                                            </div>
                                                            <div class="product_meta">
                                                                <span class="posted_in">Religion:
                                                                    <a href="" rel="tag">({{$fdoctors->religion}})</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <!-- .summary -->
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
                                                                                        <h3 class="comments-title"> All COMMENTS</h3>
                                                                                        <div class="uni-divider"></div>
                                                                                        <ul class="comment-list">
                                                                                            @php
                                                                                                $rates = App\Models\Rate::latest()->limit(20)->get();
                                                                                            @endphp
                                                                                            @foreach($rates as $item)
                                                                                            @if($item->fdoctor_id == $fdoctors->id)
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
                                                                                                                    <input class="form-control" type="hidden" name="fdoctor_id" value="{{$fdoctors->id}}">
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
                        </div>
                    </div>
    </div>

            </div>
        </section>

        @endsection