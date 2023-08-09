@extends('layouts.ext_user')

@section('content')
    <div class="page-wrapper">

        <!--Page Title-->
        <section class="page-title" style="background-image:url(images/contact.jpg);">
            <div class="auto-container">
                <h1>Contact For MediTech</h1>
                <div class="text">What We Actually Do?</div>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}"><span class="fas fa-home"></span> Home </a></li>
                    <li>Contact us</li>
                </ul>
            </div>
        </section>
        <!--End Page Title-->

        <section class="contact-page-section">
            <div class="auto-container">
                <div class="sec-title centered">
                    <h2>Now Contact With Us</h2>
                    <div class="separator"></div>
                </div>

                @if (session('update'))
                <div class="alert alert-{{ session('type') }}" style="font-family: 'Cairo', sans-serif;font-size: 18px">
                    <i class="fa fa-check" aria-hidden="true"></i>
                {{ session('update') }}</div>
                @endif

                <!-- Contact Form -->
                <div class="contact-form">

                    <!--Contact Form-->
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row clearfix">

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="username" placeholder="Name" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" placeholder="Phone" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="department" placeholder="Department" required>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="message" placeholder="Your Question"></textarea>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
                                <button class="theme-btn btn-style-two" type="submit" name="submit-form"><span class="txt">Contact Us</span></button>
                            </div>

                        </div>
                    </form>

                    <!--End Contact Form -->

            </div>
        </section>


    </div>
@endsection
