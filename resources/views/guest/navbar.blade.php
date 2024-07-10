<header class="main-header">
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="/"><img src="{{ asset('images/logo.png') }}" alt="" /></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light mx-4">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{  request ()->segment(1) == '' ? 'current' : '' }}">
                                    <a href="/"><span>Home</span></a>
                                </li>
                                <li class="{{  Request::is ('jobs','job-detail') ? 'current' : '' }}">
                                    <a href="/jobs"><span>Jobs</span></a>
                                </li>
                                <li class="{{  Request::is ('categories') ? 'current' : '' }}">
                                    <a href="/allcategories"><span>Categories</span></a>
                                </li>
                                <li class="{{  Request::is ('about') ? 'current' : '' }}">
                                    <a href="/about"><span>About Us</span></a>
                                </li>
                                @auth
                                <li class="{{  Request::is ('profile', 'profile-edit') ? 'current' : '' }} dropdown">
                                    <a><span>{{ Auth()->user()->name }}</span></a>
                                    <ul class="me-5">
                                        <li><a href="/profile">Profile</a></li>
                                        @if (Auth::user()->role=='contractor')
                                        <li><a href="/submissions">Submission</a></li>
                                        @endif
                                        <li>
                                            <a href="/logout">Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                                @endauth
                                @guest
                                <li class="{{  Request::is ('login') ? 'current' : '' }}">
                                    <a href="/login"><span>Log In</span></a>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href=""><img src="{{ asset('images/logo.png') }}" alt="" /></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                {{-- <div class="btn-box">
                    <a href="" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div> --}}
            </div>
        </div>
    </div>
</header>

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box">
        <div class="nav-logo">
            <a href=""><img src="{{ asset('assets/images/logo.png')}}" alt="" title="" /></a>
        </div>
        <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Sisingamangaraja Road, Kebayoran Baru South Jakarta 12110</li>
                <li><a href="tel:+8801682648101">(021) 727 92753</a></li>
                <li><a href="mailto:info@example.com">info@uai.ac.id</a></li>
            </ul>
        </div>
    </nav>
</div>
<!-- End Mobile Menu -->