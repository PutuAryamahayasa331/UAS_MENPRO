@extends('guest.main')

@section('container')

<!--submission-list-section -->
<section class="agents-page-section agent-details-page">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="agents-content-side tabs-box">
                    <div class="group-title">
                        <h3>Job Progress</h3>
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
                                                    @if ($sub->status == 'done_')
                                                    <div class="btn-box pull-left my-3">
                                                        <a href="https://wa.me/{{ $sub->Contractor->phone }}" class="theme-btn btn-two">Chat with Contractor</a>
                                                    </div>
                                                    <form action="/done/{{ $sub->id }}" method="POST">
                                                        @csrf
                                                        <div class="btn-box pull-right my-3 mx-3">
                                                            <button type="submit" class="theme-btn btn-one">Confirm</button>
                                                        </div>
                                                    </form>
                                                    @elseif($sub->status == 'accept')
                                                    <div class="btn-box pull-left my-3">
                                                        <a href="https://wa.me/{{ $sub->Contractor->phone }}" class="theme-btn btn-one">Chat with Contractor</a>
                                                    </div>
                                                    <div class="badge bdg1 mt-4 mx-5 pull-right">To Do
                                                    </div>
                                                    @elseif($sub->status == 'doing')
                                                    <div class="btn-box pull-left my-3">
                                                        <a href="https://wa.me/{{ $sub->Contractor->phone }}" class="theme-btn btn-one">Chat with Contractor</a>
                                                    </div>
                                                    <div class="badge bdg2 mt-4 mx-5 pull-right">Doing
                                                    </div>
                                                    @elseif($sub->status == 'done')
                                                    <div class="btn-box pull-left my-3">
                                                        <a href="https://wa.me/{{ $sub->Contractor->phone }}" class="theme-btn btn-two">Chat with Contractor</a>
                                                    </div>
                                                    <form action="/review/{{ $sub->id }}" method="GET">
                                                        <div class="btn-box pull-right mt-4 mx-3">
                                                            <button type="submit" class="theme-btn btn-one">Leave a Review</button>
                                                        </div>
                                                    </form>
                                                    @else
                                                    <div class="btn-box pull-left my-3">
                                                        <a href="https://wa.me/{{ $sub->Contractor->phone }}" class="theme-btn btn-one">Chat with Contractor</a>
                                                    </div>
                                                    <div class="badge bdg2 mt-4 mx-5 pull-right">Done
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
</section>
<!--submission-list-section end -->
@endsection