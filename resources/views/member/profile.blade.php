@extends('guest.main')

@section('container')
<!-- profile-member -->
<section class="agent-details">
    <div class="auto-container">
        @if (session()->has('updateprofile'))
        <div class="alert alert-success alert-dismissible fade show text-center m-4" role="alert">
            <small>{{ session('updateprofile') }}</small>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="agency-details-content">
            <div class="agents-block-one">
                <div class="inner-box mr-0">
                    <div class="row clearfix">
                        <div class="col-lg-3">
                            @if (Auth()->user()->profile)
                            <img src="/img/profile/{{ Auth()->user()->profile }}" style="width: 300px; height: 300px; object-fit: cover;" class="rounded" />
                            @else
                            <img src="{{ asset('images/resource/agency-details-1.jpg') }}" width="300" height="300" class="rounded" />
                            @endif
                        </div>
                        <div class=" col-lg-9">
                            <div class="content-box">
                                <div class="clearfix">
                                    <div class="title-inner pull-left">
                                        <h4>{{ Auth()->user()->name }}</h4>
                                    </div>
                                </div>
                                @if(Auth()->user()->desc)
                                <div class="text">
                                    <p>{{ Auth()->user()->desc }}</p>
                                </div>
                                @else
                                <div class="text">
                                    <p>Add description of Yourself</p>
                                </div>
                                @endif
                                <ul class="info clearfix mr-0">
                                    @if(Auth()->user()->city && Auth()->user()->country)
                                    <li><i class="icon-22"></i><a>{{ Auth()->user()->city }}, {{ Auth()->user()->country }}</a></li>
                                    @elseif(Auth()->user()->city)
                                    <li><i class="icon-22"></i><a>{{ Auth()->user()->city }}</a></li>
                                    @elseif(Auth()->user()->country)
                                    <li><i class="icon-22"></i><a>{{ Auth()->user()->country }}</a></li>
                                    @else
                                    <li><i class="icon-22"></i><a>-</a></li>
                                    @endif

                                    <li><i class="fa-solid fa-envelope"></i><a>{{ Auth()->user()->email }}</a></li>
                                    <li><i class="fa-solid fa-phone"></i><a>{{ Auth()->user()->phone }}</a></li>
                                </ul>
                                <div class="clearfix">
                                    <div class="btn-box pull-right">
                                        <a href="/profile-edit" class="theme-btn btn-one">Edit Profile</a>
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
<!-- profile-member end -->

<!-- job-posting-member-section -->
<section class="agents-page-section agent-details-page">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="agents-content-side tabs-box">
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show text-center m-4" role="alert">
                        <small>{{ session('success') }}</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @elseif(session()->has('review'))
                    <div class="alert alert-success alert-dismissible fade show text-center m-4" role="alert">
                        <small>{{ session('review') }}</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="group-title">
                        <h3>Jobs Posting</h3>
                    </div>
                    <div>
                        <div class="btn-box my-4">
                            <a href="/posting-job" class="theme-btn btn-one">Add Job Offer</a>
                        </div>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="wrapper list">
                                <div class="deals-list-content list-item">
                                    @foreach ($jobs as $job)
                                    <div class="deals-block-one my-5">
                                        <div class="inner-box">
                                            @if ($job->image1)
                                            <div class="image-box">
                                                <a href="/jobs/{{ $job->slug }}">
                                                    <figure class="image">
                                                        <img src="/img/jobs/{{ $job->image1 }}" alt="{{ $job->title }}" />
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
                                                        <img src="{{ asset('images/feature/feature-4.jpg') }}" />
                                                    </figure>
                                                </a>
                                            </div>
                                            @endif
                                            <div class="lower-content">
                                                <div class="title-text">
                                                    <h4><a href="/jobs/{{ $job->slug }}">{{ $job->title }}</a></h4>
                                                </div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left my-2">
                                                        <h6>Highest funds</h6>
                                                        <h4>Rp{{ number_format($job->rate, 0,",",".") }}</h4>
                                                    </div>
                                                    <div class="btn-box pull-right mr-5 ml-3">
                                                        <a href="/submission/{{ $job->slug }}" class="theme-btn btn-one">View Submission</a>
                                                    </div>
                                                    @if ($job->ava == 'y')
                                                    <div class="btn-box pull-right">
                                                        <a href="/edit-job/{{ $job->slug }}" class="theme-btn btn-two">Edit</a>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="post-tags">
                                                    <ul class="more-details clearfix">
                                                        <li>
                                                            <i class="icon-22"></i>
                                                            {{ $job->city->name }}
                                                        </li>
                                                        <li>
                                                            <i class="icon-16"></i>
                                                            {{ $job->category->name }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
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
    </div>
</section>
<!-- job-posting-member-section end -->
@endsection