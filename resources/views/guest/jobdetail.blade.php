@extends('guest.main')

@section('container')
<!-- job-detail-container -->
<section class="sidebar-page-container blog-details sec-pad-2">
    <div class="auto-container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center my-3" role="alert">
            <small>{{ session('success') }}</small>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @error('comb')
        <div class="alert alert-danger alert-dismissible fade show text-center my-3" role="alert">
            <small>You cannot apply for the same job again</small>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @enderror

        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">
                            @if ($job->image1)
                            <div class="image-box">
                                <figure class="image">
                                    <img src="/img/jobs/{{ $job->image1 }}" id="main_product_image" class="rounded shadow-sm" alt="{{ $job->title }}" width="770" height="520" />
                                </figure>
                                @if ($job->ava == 'n')
                                <span class="category">Already Taken</span>
                                @endif
                            </div>
                            @else
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{ asset('images/news/news-21.jpg') }}" class="rounded shadow-sm" width="770" height="520" />
                                </figure>
                            </div>
                            @endif
                            <div class="thumbnail_images mx-2 my-0">
                                <ul id="thumbnail">
                                    @if($job->image1)
                                    <li><img onclick="changeImage(this)" class="rounded" src="/img/jobs/{{ $job->image1 }}" width="120" /></li>
                                    @endif
                                    @if($job->image2)
                                    <li><img onclick="changeImage(this)" class="rounded" src="/img/jobs/{{ $job->image2 }}" width="120" /></li>
                                    @endif
                                    @if($job->image3)
                                    <li><img onclick="changeImage(this)" class="rounded" src="/img/jobs/{{ $job->image3 }}" width="120" /></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="lower-content">
                                <h3>{{ $job->title }}</h3>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                        @if ($job->user->profile)
                                        <figure class="author-thumb">
                                            <img src="/img/profile/{{ $job->user->profile }}" style="width: 50px; height: 50px; object-fit: cover;" />
                                        </figure>
                                        @else
                                        <figure class="author-thumb">
                                            <img src="{{ asset('images/news/author-1.jpg') }}" alt="" />
                                        </figure>
                                        @endif
                                        <h5><a href="/profile/{{ $job->user->username }}">{{ $job->user->name }}</a></h5>
                                    </li>
                                </ul>
                                <div class="text">
                                    <p>
                                        {!! $job->detail !!}
                                    </p>
                                </div>
                                <div class="post-tags">
                                    <ul class="tags-list clearfix">
                                        <li>
                                            <h5>Category :</h5>
                                        </li>
                                        <li><a href="/jobs?category={{ $job->category->slug }}">{{ $job->category->name }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="blog-sidebar">
                    <div class="sidebar-widget category-widget">
                        <div class="widget-title">
                            <h4>Job Detail</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="category-list clearfix">
                                <li><i class="icon-22 pr-2"></i>{{ $job->city->name }}</li>
                                <li><i class="icon-33 pr-2"></i>********</li>
                                <li><i class="icon-41 pr-2"></i>Rp{{ number_format($job->rate, 0,",",".") }}</li>
                                @if ($job->option_one != "I'm not sure i know")
                                <li><i class="icon-16 pr-2"></i>{{ $job->option_one }}</li>
                                @endif
                                @if ($job->option_two != "I'm not sure i know")
                                <li><i class="icon-30 pr-2"></i>Approx {{ $job->option_two }} Person is needed</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @if (Auth()->user()->role == "contractor" AND $job->ava == 'y')
                    <div class="sidebar-widget post-widget">
                        <div class="widget-title">
                            <h4>Are you Interested?</h4>
                        </div>
                        <section class="subscribe-section">
                            <div class="auto-container">
                                <div class="row clearfix">
                                    <div class="post-inner">
                                        <form action="/offer/{{ $job->id }}" method="POST" class="subscribe-form">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" value="{{ $job->id . Auth::user()->id }}" name="comb" id="comb">
                                                <input type="number" name="rate_offer" placeholder="Enter your bid Rate" required max="{{ $job->rate }}" />
                                                <button type="submit">Make Offer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- job-detail-container -->
@endsection