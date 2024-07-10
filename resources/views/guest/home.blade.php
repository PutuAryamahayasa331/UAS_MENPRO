@extends('guest.main')

@section('container')
<!-- banner-style-two -->
<section class="banner-style-two centred">
    <div class="banner-carousel owl-theme owl-carousel owl-nav-none">
        <div class="slide-item">
            <div class="image-layer" style="background-image:url({{ asset('images/banner/banner-2.jpg') }}"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Your Reliable Task Solution</h2>
                    <p>Connecting You to Reliable Help</p>
                </div>
            </div>
        </div>
        <div class="slide-item">
            <div class="image-layer" style="background-image:url({{ asset('images/banner/banner-3.jpg') }}"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Simplify Your Tasks with Ease</h2>
                    <p>Trusted Professionals at Your Fingertips</p>
                </div>
            </div>
        </div>
        <div class="slide-item">
            <div class="image-layer" style="background-image:url({{ asset('images/banner/banner-4.jpg') }}"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h2>Say Goodbye to Task Worries</h2>
                    <p>Efficiency Meets Convenience</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-style-two end -->

<!-- search-field-section -->
<section class="search-field-section my-4">
    <div class="auto-container">
        <div class="inner-container">
            <div class="search-field">
                <div class="tabs-box">
                    <div class="tabs-content info-group">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <div class="top-search">
                                    <form action="/jobs" class="search-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Search Job</label>
                                                    <div class="field-input">
                                                        <i class="fas fa-search"></i>
                                                        <input type="search" name="search" value="{{ request('search') }}" placeholder="Search in Handyhelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <div class="select-box">
                                                        <i class="far fa-compass"></i>
                                                        <select class="wide" name="city">
                                                            <option value="">All City</option>
                                                            @foreach ($cities as $city)
                                                            <option value="{{ $city->slug }}">{{ $city->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <div class="select-box">
                                                        <select class="wide" name="category">
                                                            <option value="">All Category</option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search-btn">
                                            <button type="submit">
                                                <i class="fas fa-search"></i>Search
                                            </button>
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
</section>
<!-- search-field-section end -->

<!-- category-section -->
<section class="category-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <ul class="category-list clearfix">
                @foreach ($categories->take(5) as $category)
                <li>
                    <div class="category-block-one">
                        <a href="/jobs?category={{ $category->slug }}">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="/images/category/{{ $category->image }}" class="d-inline-block align-text" width="60">
                                </div>
                                <h5><a href="/jobs?category={{ $category->slug }}">{{ $category->name }}</a></h5>
                            </div>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="more-btn"><a href="/allcategories" class="theme-btn btn-one">All Categories</a></div>
        </div>
    </div>
</section>
<!-- category-section end -->

<!-- Newest Jobs -->
@if ($jobs->count()>0)
<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>View the latest Job</h5>
            <h2>Newest Jobs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">
            @foreach ($jobs->take(3) as $job)
            <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-4">
                <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        @if ($job->image1)
                        <div class="image-box">
                            <a href="/jobs/{{ $job->slug }}">
                                <figure class="image">
                                    <img src="/img/jobs/{{ $job->image1 }}" alt="{{ $job->title }}" style="height: 250px; object-fit: cover;" class="rounded" />
                                </figure>
                                @if ($job->ava == 'n')
                                <span class="category">Already Taken</span>
                                @endif
                            </a>
                        </div>
                        @else
                        <div class="image-box">
                            <a href="/jobs/{{ $job->slug }}">
                                <figure class="image">
                                    <img src="{{ asset('images/feature/feature-4.jpg') }}" width="370" height="250" />
                                </figure>
                            </a>
                        </div>
                        @endif
                        <div class="lower-content">
                            <div class="title-text">
                                <h4><a href="/jobs/{{ $job->slug }}">{{ $job->title }}</a></h4>
                            </div>
                            <div class="price-box clearfix">
                                <div class="price-info pull-left">
                                    <h6>Highest funds</h6>
                                    <h4>Rp{{ number_format($job->rate, 0,",",".") }}</h4>
                                </div>
                            </div>
                            <ul class="more-details clearfix">
                                <li><i class="icon-22"></i>{{ $job->city->name }}</li>
                                <li><i class="icon-16"></i>{{ $job->category->name }}</li>
                            </ul>
                            <div class="btn-box"><a href="/jobs/{{ $job->slug }}" class="theme-btn btn-two">See Details</a></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="more-btn centred"><a href="/jobs" class="theme-btn btn-one">View All Jobs</a></div>
    </div>
</section>
@endif
<!-- Newest Jobs end -->

<!-- video-section -->
<section class="video-section centred" style="background-image: url({{ asset('images/background/handyhelp.png)') }}">
    <div class="auto-container">
        <div class="video-inner">
            <div class="video-btn">
                <a href="https://youtu.be/7uA_Sp90ENw" class="lightbox-image" data-caption=""><i class="icon-17"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- video-section end -->

<!-- Best Contractors -->
{{-- <section class="deals-section sec-pad">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Find the best contractor</h5>
            <h2>Our Best Contractors</h2>
        </div>
        <div class="deals-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            <div class="single-item">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="deals-block-one">
                            <div class="inner-box">
                                <span class="category">Featured</span>
                                <div class="lower-content">
                                    <div class="title-text">
                                        <h4><a href="property-details.html">Michael Bean</a></h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>$300.00</h4>
                                        </div>
                                    </div>
                                    <p>Success isn’t really that difficult. There is a significant portion of the population here in North America.</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-22"></i>Jakarta</li>
                                    </ul>
                                    <div class="btn-box"><a href="property-details.html" class="theme-btn btn-one">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/resource/deals-1.jpg') }}" alt="" /></figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="deals-block-one">
                            <div class="inner-box">
                                <span class="category">Featured</span>
                                <div class="lower-content">
                                    <div class="title-text">
                                        <h4><a href="property-details.html">John Doe</a></h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>$300.00</h4>
                                        </div>
                                    </div>
                                    <p>Success isn’t really that difficult. There is a significant portion of the population here in North America.</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-22"></i>Jakarta</li>
                                    </ul>
                                    <div class="btn-box"><a href="property-details.html" class="theme-btn btn-one">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/resource/deals-1.jpg') }}" alt="" /></figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-item">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="deals-block-one">
                            <div class="inner-box">
                                <span class="category">Featured</span>
                                <div class="lower-content">
                                    <div class="title-text">
                                        <h4><a href="property-details.html">Michael Jordan</a></h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>$300.00</h4>
                                        </div>
                                    </div>
                                    <p>Success isn’t really that difficult. There is a significant portion of the population here in North America.</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-22"></i>Jakarta</li>
                                    </ul>
                                    <div class="btn-box"><a href="property-details.html" class="theme-btn btn-one">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 deals-block">
                        <div class="image-box">
                            <figure class="image"><img src="{{ asset('images/resource/deals-1.jpg') }}" alt="" /></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Best Contractors end -->

<!-- WHY CHOOSE US? -->
<section class="chooseus-section alternate-2 bg-color-1">
    <div class="auto-container">
        <div class="upper-box clearfix">
            <div class="sec-title">
                <h5>Why Choose Us?</h5>
                <h2>Reasons To Choose Us</h2>
            </div>
        </div>
        <div class="lower-box">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-19"></i></div>
                            <h4>Best contractors in their fields</h4>
                            <p>HandyHelp have workers who are competent and experts in their fields, have a lot of experience, are responsible, and are certified.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-26"></i></div>
                            <h4>Friendly rates</h4>
                            <p>Handyhelp prepares a feature where rates can adjust from members and contractors with the deal to deal feature. Can help both members and contractors themselves.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-21"></i></div>
                            <h4>Safe and Reliable</h4>
                            <p>Handyhelp is a trusted website platform that can help solve your daily problems, have attractive features and is easy to understand or use.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WHY CHOOSE US? end -->

<!-- Most Popular Places -->
@if ($cities->count()>0)
<section class="place-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Top Places</h5>
            <h2>Most Popular Places to Find a Job</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
        </div>
        <div class="sortable-masonry">
            <div class="items-container row clearfix">
                @foreach ($cities->take(1) as $city)
                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <a href="/jobs?city={{ $city->slug }}">
                                <figure class="image-box">
                                    <img src="/images/city/{{ $city->image }}" height="1000" />
                                </figure>
                                <div class="text">
                                    <h4>
                                        <a href="/jobs?city={{ $city->slug }}">{{ $city->name }}</a>
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($cities->skip(1)->take(1) as $city)
                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <a href="/jobs?city={{ $city->slug }}">
                                <figure class="image-box">
                                    <img src="/images/city/{{ $city->image }}" />
                                </figure>
                                <div class="text">
                                    <h4>
                                        <a href="/jobs?city={{ $city->slug }}">{{ $city->name }}</a>
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($cities->skip(2)->take(1) as $city)
                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <a href="/jobs?city={{ $city->slug }}">
                                <figure class="image-box">
                                    <img src="/images/city/{{ $city->image }}" alt="" />
                                </figure>
                                <div class="text">
                                    <h4>
                                        <a href="/jobs?city={{ $city->slug }}">{{ $city->name }}</a>
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($cities->skip(3)->take(1) as $city)
                <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <a href="/jobs?city={{ $city->slug }}">
                                <figure class="image-box">
                                    <img src="/images/city/{{ $city->image }}" />
                                </figure>
                                <div class="text">
                                    <h4>
                                        <a href="/jobs?city={{ $city->slug }}">{{ $city->name }}</a>
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<!-- Most Popular Places end -->

<!-- testimonial-section end -->
{{-- <section class="testimonial-section bg-color-1 centred">
    <div class="pattern-layer" style="background-image: url({{ asset('images/shape/shape-1.png') }})"></div>
    <div class="auto-container">
        <div class="sec-title">
            <h5>Testimonials</h5>
            <h2>What They Say About Us</h2>
        </div>
        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="{{ asset('images/resource/testimonial-1.jpg') }}" alt="" /></figure>
                    <div class="text">
                        <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To make that happen we are committed to provid ing an environment in which residents can enjoy.</p>
                    </div>
                    <div class="author-info">
                        <h4>Rebeka Dawson</h4>
                        <span class="designation">Instructor</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="{{ asset('images/resource/testimonial-2.jpg') }}" alt="" /></figure>
                    <div class="text">
                        <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To make that happen we are committed to provid ing an environment in which residents can enjoy.</p>
                    </div>
                    <div class="author-info">
                        <h4>Marc Kenneth</h4>
                        <span class="designation">Founder CEO</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="{{ asset('images/resource/testimonial-1.jpg') }}" alt="" /></figure>
                    <div class="text">
                        <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To make that happen we are committed to provid ing an environment in which residents can enjoy.</p>
                    </div>
                    <div class="author-info">
                        <h4>Owen Lester</h4>
                        <span class="designation">Manager</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- testimonial-section end -->

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

<!-- Looking for a Job -->
@guest
<section class="cta-section bg-color-2">
    <div class="pattern-layer" style="background-image: url({{ asset('images/shape/shape-2.png') }})"></div>
    <div class="auto-container">
        <div class="inner-box clearfix">
            <div class="text pull-left">
                <h2>Looking for a Job or <br />Want to offer an existing one</h2>
            </div>
            <div class="btn-box pull-right">
                <a href="/signup_member" class="theme-btn btn-three">Offer</a>
                <a href="/signup_contractor" class="theme-btn btn-one">Find</a>
            </div>
        </div>
    </div>
</section>
@endguest
<!-- Looking for a Job end -->

<!-- NEWS & ARTICLE -->
{{-- <section class="news-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>News & Article</h5>
            <h2>Stay Update With HandyHelp</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="blog-details.html"><img src="{{ asset('images/news/news-1.jpg') }}" alt="" /></a>
                            </figure>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">Including Animation In Your Design System</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img src="{{ asset('images/news/author-1.jpg') }}" alt="" /></figure>
                                    <h5><a href="blog-details.html">Eva Green</a></h5>
                                </li>
                                <li>April 10, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="blog-details.html"><img src="{{ asset('images/news/news-2.jpg') }}" alt="" /></a>
                            </figure>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">Taking The Pattern Library To The Next Level</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img src="{{ asset('images/news/author-2.jpg') }}" alt="" /></figure>
                                    <h5><a href="blog-details.html">George Clooney</a></h5>
                                </li>
                                <li>April 09, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="blog-details.html"><img src="{{ asset('images/news/news-3.jpg') }}" alt="" /></a>
                            </figure>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">How New Font Technologies Will Improve The Web</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img src="{{ asset('images/news/author-3.jpg') }}" alt="" /></figure>
                                    <h5><a href="blog-details.html">Simon Baker</a></h5>
                                </li>
                                <li>April 28, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- NEWS & ARTICLE end -->
@endsection