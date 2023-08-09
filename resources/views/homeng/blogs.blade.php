@extends('layouts.ext_user')

@section('content')
    <div class="page-wrapper">
        <section class="page-title" style="background-image:url(images/background/7.jpg);">
            <div class="auto-container">
                <h1>Latest New By MediTech</h1>
                <div class="text">What We Actually Do?</div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html"><span class="fas fa-home"></span> Home </a></li>
                    <li>Latest News</li>
                </ul>
            </div>
        </section>
        <!--End Page Title-->

        <!-- Blog Page Section -->
        <section class="blog-page-section">
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- News Block Two -->
                    @foreach ($new as $item)
                        <div class="news-block-two col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="{{ route('show', $item->id) }}"><img src="{{ $item->image_url }}"
                                            style="height: 330px !important;" alt="" /></a>
                                </div>
                                <div class="lower-content">
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>{{ $item->created_at->diffForHumans() }}</li>
                                            <li>{{ $item->news_source }}</li>
                                        </ul>
                                        <h3><a href="{{ route('show', $item->id) }}">{{ Str::limit($item->title, 35) }}</a></h3>
                                        <div class="text">{{ Str::limit($item->description, 300) }}</div>
                                        <a href="{{ route('show', $item->id) }}"
                                            class="theme-btn btn-style-five"><span class="txt">read more</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Styled Pagination -->
                {{--  <div class="styled-pagination text-center">
                    <ul class="inner-container clearfix">
                        <li class="prev"><a href="#" class="active"><i class="flaticon-left-arrow"></i> Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li class="next"><a href="#" class="active">Next <i class="flaticon-right-arrow-1"></i></a></li>
                    </ul>
                </div>  --}}

            </div>
        </section>
        <!-- End Portfolio Page Section -->


    </div>
@endsection
