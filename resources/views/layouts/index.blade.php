<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>{{ config('app.name', 'NewsBox') }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('contents/frontend')}}/img/core-img/favicon.ico">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('contents/frontend')}}/css/style.css">
</head>
<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">
                        <!-- Nav brand -->
                        <a href="" class="nav-brand"><img src="{{asset('contents/frontend')}}/img/core-img/logo.png" alt=""></a>
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    @foreach($category as $row)
                                    <li><a href="{{url('/singlePost')}}">{{$row->cat_name_bn}}</a>
                                        @php
                                            $subCatagory=DB::table('sub_category')->where('cat_id', $row->cat_id)->get();
                                        @endphp
                                        <div class="megamenu">
                                            <ul class="dropdown">
                                                @foreach($subCatagory as $row)
                                                    <li class="title"><a href="">{{$row->subcat_name_bn}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    <!-- ##### Breaking News Area Start ##### -->
    <section class="breaking-news-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Breaking News Widget -->
                    <div class="breaking-news-ticker d-flex flex-wrap align-items-center">
                        <div class="title">
                            <h6>সদ্যপ্রাপ্ত সংবাদ</h6>
                        </div>
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                @foreach($bnews as $row)
                                    <li>
                                        <a class="text-danger" href="">{{$row->news_title_bn}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breaking News Area End ##### -->
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Post Slides -->
        <div class="hero-post-slides owl-carousel">
            <!-- Single Slide -->
            <div class="single-slide">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Single Blog Post Area -->
                        <div class="col-12 col-md-7">
                            @foreach($bigThumbnail as $row)
                            <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="100ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 600px"></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">{{$row->post_date}}</span>
                                    <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-5">
                            <!-- Single Blog Post Area -->
                            @foreach($firstThumbnail as $row)
                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="400ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 300px"></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">{{$row->post_date}}</span>
                                    <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                </div>
                            </div>
                            <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->
    <!-- ##### Intro News Area Start ##### -->
    <section class="intro-news-area section-padding-100-0 mb-70">
        <div class="container d-flex">
            <div class="row justify-content-center">
                <!-- Intro News Tabs Area -->
                <div class="col-12 col-lg-8">
                    <div class="intro-news-tab">
                        <!-- Intro News Filter -->
                        <div class="intro-news-filter d-flex justify-content-between">
                            <h6>All the news</h6>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav1" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Latest</a>
                                    <a class="nav-item nav-link" id="nav2" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Popular</a>
                                    <a class="nav-item nav-link" id="nav3" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">International</a>
                                    <a class="nav-item nav-link" id="nav4" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false">Local</a>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav1">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6 d-flex">
                                        @foreach($firstSection as $row)
                                        <div class="col-md-12 single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="singlePost"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 250px"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">{{$row->post_date}}</span>
                                                <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    {{-- <div class="col-12 col-sm-6 d-flex">
                                        @foreach($secondSection as $row)
                                        <div class="col-md-12 single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="singlePost"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 250px"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">{{$row->post_date}}</span>
                                                <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div> --}}
                                    <div class="d-flex">
                                        <div class="col-12 col-sm-6">
                                            @foreach($firstSection as $row)
                                                <div class="col-md-12 single-blog-post d-flex style-4 mb-30">
                                                    <!-- Blog Thumbnail -->
                                                    <div class="blog-thumbnail">
                                                        <a href="#"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 120px"></a>
                                                    </div>
                                                    <!-- Blog Content -->
                                                    <div class="blog-content">
                                                        <span class="post-date">{{$row->post_date}}</span>
                                                        <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                        <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            @foreach($secondSection as $row)
                                                <div class="col-md-12 single-blog-post d-flex style-4 mb-30">
                                                    <!-- Blog Thumbnail -->
                                                    <div class="blog-thumbnail">
                                                        <a href="#"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 120px"></a>
                                                    </div>
                                                    <!-- Blog Content -->
                                                    <div class="blog-content">
                                                        <span class="post-date">{{$row->post_date}}</span>
                                                        <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                        <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav2">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6 d-flex">
                                        @foreach($firstSection as $row)
                                        <div class="col-md-12 single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="singlePost"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 250px"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">{{$row->post_date}}</span>
                                                <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <div class="col-12 col-sm-6 d-flex">
                                            @foreach($firstSection as $row)
                                                <div class="col-md-12 single-blog-post d-flex style-4 mb-30">
                                                    <!-- Blog Thumbnail -->
                                                    <div class="blog-thumbnail">
                                                        <a href="#"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 120px"></a>
                                                    </div>
                                                    <!-- Blog Content -->
                                                    <div class="blog-content">
                                                        <span class="post-date">{{$row->post_date}}</span>
                                                        <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                        <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav3">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6 d-flex">
                                        @foreach($firstSection as $row)
                                        <div class="col-md-12 single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="singlePost"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 250px"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">{{$row->post_date}}</span>
                                                <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <div class="col-12 col-sm-6 d-flex">
                                            @foreach($firstSection as $row)
                                                <div class="col-md-12 single-blog-post d-flex style-4 mb-30">
                                                    <!-- Blog Thumbnail -->
                                                    <div class="blog-thumbnail">
                                                        <a href="#"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 120px"></a>
                                                    </div>
                                                    <!-- Blog Content -->
                                                    <div class="blog-content">
                                                        <span class="post-date">{{$row->post_date}}</span>
                                                        <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                        <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav4">
                                <div class="row">
                                    <!-- Single News Area -->
                                    <div class="col-12 col-sm-6 d-flex">
                                        @foreach($firstSection as $row)
                                        <div class="col-md-12 single-blog-post style-2 mb-5">
                                            <!-- Blog Thumbnail -->
                                            <div class="blog-thumbnail">
                                                <a href="singlePost"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 250px"></a>
                                            </div>
                                            <!-- Blog Content -->
                                            <div class="blog-content">
                                                <span class="post-date">{{$row->post_date}}</span>
                                                <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div>
                                        <div class="col-12 col-sm-6 d-flex">
                                            @foreach($firstSection as $row)
                                                <div class="col-md-12 single-blog-post d-flex style-4 mb-30">
                                                    <!-- Blog Thumbnail -->
                                                    <div class="blog-thumbnail">
                                                        <a href="#"><img src="{{asset('img/'.$row->img)}}" alt="" style="height: 120px"></a>
                                                    </div>
                                                    <!-- Blog Content -->
                                                    <div class="blog-content">
                                                        <span class="post-date">{{$row->post_date}}</span>
                                                        <a href="#" class="post-title">{{$row->news_title_bn}}</a>
                                                        <a href="#" class="post-author">{{$row->news_tags_bn}}</a>
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

                <!-- Sidebar Widget -->
                <div class="col-12 col-sm-9 col-md-6 col-lg-4">
                    <div class="sidebar-area">

                        <!-- Newsletter Widget -->
                        <div class="single-widget-area newsletter-widget mb-30">
                            <h4>Subscribe to our newsletter</h4>
                            <form action="#" method="post">
                                <input type="email" name="nl-email" id="nlemail" placeholder="Your E-mail">
                                <button type="submit" class="btn newsbox-btn w-100">Subscribe</button>
                            </form>
                            <p class="mt-30">Please have get your Identity. Submit your Questions or Opinion to Know details about We.</p>
                        </div>

                        <!-- Add Widget -->
                        <div class="single-widget-area add-widget mb-30">
                            <a href="#">
                                <img src="{{asset('contents/frontend')}}/img/bg-img/add000.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Intro News Area End ##### -->

    <!-- ##### Video Area Start ##### -->
    <section class="video-area bg-img bg-overlay bg-fixed" style="background-image: url({{asset('contents/frontend')}}/img/bg-img/1.jpg);">
        <div class="container">
            <div class="row">
                <!-- Featured Video Area -->
                <div class="col-12">
                    <div class="featured-video-area d-flex align-items-center justify-content-center">
                        <div class="video-content text-center">
                            <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                            <span class="published-date">Dec 05, 2023</span>
                            <h3 class="video-title">Traffic Problems in Time Square</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Video Slideshow -->
        <div class="video-slideshow py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Video Slides -->
                        <div class="video-slides owl-carousel">

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/004.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">Dec 10, 2023</span>
                                    <p class="post-title">লোহিত সাগর নিয়ে কেন উদ্বেগ, বিশ্ববাণিজ্যের জন্য এটি কতটা গুরুত্বপূর্ণ</p>
                                    <a href="#" class="post-author">বাণিজ্য ডেস্ক</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/003.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">Dec 10, 2023</span>
                                    <p class="post-title">মূল্যস্ফীতি ঠেকাতে ১১ হাজার কোটি ডলারের বেশি খরচ করবে জাপান </p>
                                    <a href="#" class="post-author">বিশ্ব অর্থনীতি</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/000.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">Dec 10, 2023</span>
                                    <p class="post-title">ভারত পেয়েছে এক লাখ কোটি রুপির বিনিয়োগ প্রস্তাব, গেছে বাংলাদেশ থেকেও</p>
                                    <a href="#" class="post-author">ভারত ডেস্ক</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/004.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>
                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">Dec 10, 2023</span>
                                    <p class="post-title">সরকারের সাজানো মামলার গুমর ফাঁস হয়েছে: রিজভী</p>
                                    <a href="{{url('/singlePost')}}" class="post-author">নিজস্ব প্রতিবেদক</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/003.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">Dec 15, 2023</span>
                                    <p class="post-title">কুমিল্লার তিতাসে আওয়ামী লীগ নেতাকে ছুরিকাঘাতে হত্যা </p>
                                    <a href="#" class="post-author">কুমিল্লা প্রতিবেদক</a>
                                </div>
                            </div>

                            <!-- Single News Area -->
                            <div class="single-blog-post style-3">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail">
                                    <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/000.jpg" alt=""></a>
                                    <a href="#" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">Dec 10, 2023</span>
                                    <p class="post-title">ভারত পেয়েছে এক লাখ কোটি রুপির বিনিয়োগ প্রস্তাব, গেছে বাংলাদেশ থেকেও</p>
                                    <a href="#" class="post-author">ভারত ডেস্ক</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Video Area End ##### -->

    <!-- ##### Top News Area Start ##### -->
    <div class="top-news-area section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/003.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">Dec 08, 2023</span>
                            <a href="{{url('/singlePost')}}" class="post-title">মূল্যস্ফীতি ঠেকাতে ১১ হাজার কোটি ডলারের বেশি খরচ করবে জাপান</a>
                            <a href="#" class="post-author">নিজস্ব প্রতিবেদক</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/0005.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">Dec 05, 2023</span>
                            <a href="#" class="post-title">আমি সেই যোদ্ধা, যে অস্ত্র জমা দিয়েছি, কিন্তু ট্রেনিং জমা দিইনি </a>
                            <a href="#" class="post-author">মনজুর কাদের- ঢাকা</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/0004.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">Dec 13, 2023</span>
                            <a href="#" class="post-title">বিয়ে নিয়ে কি ভাবছেন বাঁধন, কেমন ছেলে পছন্দ</a>
                            <a href="#" class="post-author">বিনোদন প্রতিবেদক- ঢাকা</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/0003.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">Dec 08, 2023</span>
                            <a href="#" class="post-title">রাজশাহী শহরে হরতালের সমর্থনে মিছিল, ৪ শিবির কর্মী আটক</a>
                            <a href="#" class="post-author">প্রতিনিধি-রাজশাহী</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/0006.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">Dec 08, 2023</span>
                            <a href="#" class="post-title">ওয়ান ব্যাংকে স্নাতক পাসে চাকরি, প্রয়োজন নেই অভিজ্ঞতার, পদ ৫০ </a>
                            <a href="#" class="post-author">চাকরি-বাকরি প্রতিবেদক</a>
                        </div>
                    </div>
                </div>

                <!-- Single News Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-blog-post style-2 mb-5">
                        <!-- Blog Thumbnail -->
                        <div class="blog-thumbnail">
                            <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/002.jpg" alt=""></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <span class="post-date">Dec 08, 2023</span>
                            <a href="#" class="post-title">নির্বাচনের প্রচারে কৃত্রিম বুদ্ধিমত্তার ‘ইমরান খান’</a>
                            <a href="#" class="post-author">নিজস্ব প্রতিনিধি</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="load-more-button text-center">
                        <a href="#" class="btn newsbox-btn">Load More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Top News Area End ##### -->
    <!-- ##### Add Area Start ##### -->
    <div class="big-add-area mb-100">
        <div class="container-fluid">
            <a href="#"><img src="{{asset('contents/frontend')}}/img/bg-img/add00.jpeg" alt=""></a>
        </div>
    </div>
    <!-- ##### Add Area End ##### -->
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Footer Logo -->
        <div class="footer-logo mb-100">
            <a href=""><img src="{{asset('contents/frontend')}}/img/core-img/logo.png" alt=""></a>
        </div>
        <!-- Footer Content -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content text-center">
                        <!-- Footer Nav -->
                        <div class="footer-nav">
                            <ul>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Closed Captioning</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="behance"><i class="fa fa-behance" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite-text"><a href="#">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="">Newsportal</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('contents/frontend')}}/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{asset('contents/frontend')}}/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('contents/frontend')}}/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{asset('contents/frontend')}}/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="{{asset('contents/frontend')}}/js/active.js"></script>
</body>
</html>