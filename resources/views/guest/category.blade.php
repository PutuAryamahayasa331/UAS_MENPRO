@extends('guest.main')

@section('container')
<section class="category-section category-page mr-0 pt-20 pb-20">
    @if ($jobs->count() > 0)
    @foreach ($jobs->take(1) as $job)
    <div class="auto-container">
        <div class="sec-title centred mb-lg-5">
            <h2>Jobs in {{ $job->category->name }}</h2>
            {{-- <h5>Find a job that suits you</h5> --}}
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
        </div>
        <section class="search-field-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="search-field">
                        <div class="tabs-box">
                            <div class="tabs-content info-group">
                                <div class="tab active-tab" id="tab-1">
                                    <div class="inner-box">
                                        <div class="top-search">
                                            <form action="/categories" class="search-form">
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
                                                                    @if ($job->category->slug == $category->slug)
                                                                    <option value="{{ $category->slug }}" selected>{{ $category->name }}</option>
                                                                    @else
                                                                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                                                    @endif
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
        <div class="row clearfix">
            @foreach ($jobs as $job)
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
    </div>
    @endforeach
    @else
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>Job not Found</h2>
        </div>
    </div>
    @endif
</section>
@endsection