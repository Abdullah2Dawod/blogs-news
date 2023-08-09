@extends('layouts.ext_user')

@section('content')
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!--Page Title-->
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
        <div class="container">
            <div class="col-12 m-3">
                @if (session('update'))
                    <div class="alert alert-{{ session('type') }}" style="font-family: 'Cairo', sans-serif;font-size: 18px">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ session('update') }}
                    </div>
                @endif
            </div>
        </div>


        <!--Sidebar Page Container-->
        <div class="sidebar-page-container">
            <div class="auto-container">
                <div class="row clearfix">

                    <!--Content Side-->
                    <div class="content-side col-lg-8 col-md-12 col-sm-12">
                        <div class="news-detail">

                            <div class="inner-box">
                                <div class="image">
                                    <img src="{{ $new->image_url }}" alt="" />
                                </div>
                                <div class="lower-content">
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>June 21, 2018 at 8:12pm</li>
                                            <li>Post By: {{ $new->news_source }}</li>
                                        </ul>
                                        <h3>{{ $new->title }}</h3>
                                        <div class="text">
                                            <p>{{ $new->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Other Options -->
                            <div class="post-share-options clearfix">
                                <div class="pull-left">
                                    <p>Shere : </p>
                                    <ul class="social-icon">
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-google-plus"></span></a></li>
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <!--Comments Area-->
                        <div class="comments-area">

                            <div class="group-title">
                                <h2>Comments : {{ $comment->count() }} </h2>
                            </div>

                            <!--Comment Box-->
                            @foreach ($comment as $index => $item)
                                @if ($index < 3)
                                    <div class="comment-box">
                                        <div class="comment">
                                            <div class="author-thumb">
                                            </div>
                                            <div class="comment-inner">
                                                <div class="comment-info clearfix"><strong>{{ $item->name }}</strong>
                                                    <div class="comment-time">{{ $item->created_at->diffForHumans() }}</div>
                                                </div>
                                                <div class="text">{{ $item->subject }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>


                        <!-- Comment Form -->
                        <div class="comment-form">

                            <div class="group-title">
                                <h2>Leave a Reply</h2>
                            </div>

                            <!-- Comment Form -->
                            <div class="comment-form">
                                <!-- Comment Form -->
                                <form method="post" action="{{ route('comment.store') }}">
                                    @csrf
                                    <input type="hidden" name="news_id" value="{{ $new->id }}">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <input type="text" name="name" placeholder="Full Name" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" name="email" placeholder="Email" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="subject" placeholder="Subject" required>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" placeholder="Message"></textarea>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <button class="theme-btn comment-btn" type="submit" name="submit-form">Post
                                                Comments</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                            <!--End Faq Form -->

                        </div>

                    </div>

                </div>
            </div>
        </div>
    @endsection
