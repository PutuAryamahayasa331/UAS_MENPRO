@extends('guest.main')

@section('container')

<!--submission-list-section -->
<section class="agents-page-section agent-details-page">
    @if ($subs->count() > 0)
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
                    @endif
                    <div class="group-title">
                        <h3>Submission List</h3>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="blog-details-content">
                                <div class="comments-area">
                                    <div class="comment-box">
                                        @foreach ($subs as $sub)
                                        <div class="comment">
                                            @if ($sub->Contractor->profile)
                                            <figure class="thumb-box">
                                                <img src="/img/profile/{{ $sub->Contractor->profile }}" width="50" height="50" class="rounded" />
                                            </figure>
                                            @else
                                            <figure class="thumb-box">
                                                <img src="{{ asset('images/news/comment-1.jpg') }}" alt="">
                                            </figure>
                                            @endif
                                            <div class="comment-inner">
                                                <div class="comment-info clearfix">
                                                    <h5>{{ $sub->Contractor->name }}</h5>
                                                    <span>{{ $sub->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="text-dark">
                                                    <i class="fa-solid fa-money-bill"></i>
                                                    Rp{{ number_format($sub->rate_offer, 0,",",".") }}
                                                </div>
                                                <div class="price-box clearfix my-3">
                                                    <div class="btn-box pull-left my-3">
                                                        <a href="/profile/{{ $sub->Contractor->username }}" class="theme-btn btn-two">View Profile</a>
                                                    </div>
                                                    @if ($sub->status == 'accept')
                                                    <div class="btn-box pull-right mx-5 my-3">
                                                        <a href="/progress/{{ $sub->Job->slug }}" class="theme-btn btn-one">View Progress Job</a>
                                                    </div>
                                                    @elseif($sub->status == 'review')
                                                    <form action="/decline/{{ $sub->id }}" method="POST">
                                                        @csrf
                                                        <div class="btn-box pull-right my-3 mx-3">
                                                            <button type="submit" class="theme-btn btn-two">Decline</button>
                                                        </div>
                                                    </form>
                                                    <form action="/accept/{{ $sub->id }}" method="POST">
                                                        @csrf
                                                        <div class="btn-box pull-right my-3">
                                                            <button type="submit" class="theme-btn btn-one btn-outline-dark">Accept</button>
                                                        </div>
                                                    </form>
                                                    @elseif($sub->status == 'reject')
                                                    <div class="badge bdg3 my-3 mx-5 pull-right">Rejected
                                                    </div>
                                                    @elseif($sub->status == 'done')
                                                    <form action="/review/{{ $sub->id }}" method="GET">
                                                        <div class="btn-box pull-right mt-4 mx-3">
                                                            <button type="submit" class="theme-btn btn-one">Leave a Review</button>
                                                        </div>
                                                    </form>
                                                    @elseif($sub->status == 'reviewed')
                                                    <div class="badge bdg2 my-3 mx-5 pull-right">Reviewed
                                                    </div>
                                                    @else
                                                    <div class="btn-box pull-right mx-5 my-3">
                                                        <a href="/progress/{{ $sub->Job->slug }}" class="theme-btn btn-one">View Progress Job</a>
                                                    </div>
                                                    @endif
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
    </div>
    @else
    <div class="auto-container">
        <div class="sec-title centred">
            <h2>Submission not Found</h2>
        </div>
    </div>
    @endif
</section>
<!--submission-list-section end -->
@endsection