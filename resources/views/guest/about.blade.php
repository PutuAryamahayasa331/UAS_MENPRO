@extends('guest.main')

@section('container')
<!-- about-section -->
<section class="about-section about-page pb-0">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image_block_2">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/resource/job.gif') }}" alt="" /></figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_3">
                        <div class="content-box">
                            <div class="sec-title">
                                <h2>HandyHelp</h2>
                                <h5>Connecting Hands, Solving demands.</h5>
                            </div>
                            <div class="text">
                                <p>
                                    Welcome to HandyHelp! We're your trusted website for finding reliable professionals to help with a wide range of tasks and projects. Simply post your task, compare professional profiles and reviews, and hire the best fit for
                                    your needs.
                                </p>

                                <p>Join us today and simplify your life with HandyHelp!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-section end -->

<!-- cta-section -->
<section class="cta-section alternate-2 pb-240 centred" style="background-image: url({{ asset('images/background/New.jpg)') }}">
    <div class="auto-container">
        <div class="inner-box clearfix">
            <div class="text">
                <h2>Looking for a Job or <br />Want to offer an existing one</h2>
            </div>
            <div class="btn-box">
                <a href="/signup_member" class="theme-btn btn-three">Offer</a>
                <a href="/signup_contractor" class="theme-btn btn-one">Find</a>
            </div>
        </div>
    </div>
</section>
<!-- cta-section end -->

<!-- funfact-section -->
<section class="funfact-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="{{ $contractor }}">{{ $contractor }}</span>
                            </div>
                            <p>Total Contractors</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="{{ $member }}">{{ $member }}</span>
                            </div>
                            <p>Total Member</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 funfact-block">
                    <div class="funfact-block-one">
                        <div class="inner-box">
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="1500" data-stop="{{ $jobs }}">{{ $jobs }}</span>
                            </div>
                            <p>Total Jobs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- funfact-section end -->

<!-- WE ARE TEAM -->
<section class="team-section sec-pad centred">
    <div class="pattern-layer"></div>
    <div class="auto-container">
        <div class="sec-title">
            <h5>We are Team</h5>
            <h2>Meet Our Team Members</h2>
        </div>
        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{ asset('images/team/team-1.png') }}" alt="" /></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Muhammad Fadhil</a></h4>
                            <span class="designation">Scrum Master</span>
                            <ul class="social-links clearfix">
                                <li>
                                    <a href="index.html"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{ asset('images/team/team-2.png') }}" alt="" /></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Teni Nur Afifah Oktaviana</a></h4>
                            <span class="designation">Designer</span>
                            <ul class="social-links clearfix">
                                <li>
                                    <a href="index.html"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{ asset('images/team/team-3.png') }}" alt="" /></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Muhammad Selfano</a></h4>
                            <span class="designation">Developer</span>
                            <ul class="social-links clearfix">
                                <li>
                                    <a href="index.html"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{ asset('images/team/team-4.png') }}" alt="" /></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Belvas Ghazalah Aufa</a></h4>
                            <span class="designation">Developer</span>
                            <ul class="social-links clearfix">
                                <li>
                                    <a href="index.html"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{ asset('images/team/team-5.png') }}" alt="" /></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Saufa Tahsunien Udjma</a></h4>
                            <span class="designation">Designer</span>
                            <ul class="social-links clearfix">
                                <li>
                                    <a href="index.html"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="index.html"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WE ARE TEAM end -->
@endsection