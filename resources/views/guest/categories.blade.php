@extends('guest.main')

@section('container')
<!-- category-section -->
<section class="category-section category-page centred mr-0 pt-20 pb-20">
    <div class="auto-container">
        <div class="sec-title centred">
            {{-- <h5>Jobs Category</h5> --}}
            <h2>Categories</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
        </div>
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <ul class="category-list clearfix">
                @foreach ($categories as $category)
                <li>
                    <div class="category-block-one">
                        <a href="/jobs?category={{ $category->slug }}">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <img src="/images/category/{{ $category->image }}" class="d-inline-block align-text" width="60">
                                </div>
                                <h5>
                                    <a href="/jobs?category={{ $category->slug }}">{{ $category->name }}</a>
                                </h5>
                            </div>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!-- category-section end -->
@endsection