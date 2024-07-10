@extends('guest.main')

@section('container')
<!-- login-section -->
<section class="ragister-section centred sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                <div class="sec-title">
                    <h5>Glad to see You Back!</h5>
                    <h2>Sign In with HandyHelp</h2>
                </div>

                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show text-center m-4" role="alert">
                    <small>{{ session('success') }}</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show text-center m-4" role="alert">
                    <small>{{ session('loginError') }}</small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="tabs-box">
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <form method="POST" action="/login" class="default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}" />
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required />
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Log In</button>
                                    </div>
                                </form>
                                <div class="othre-text">
                                    <p>Have not any account? <a href="/signup_member">Register Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login-section end -->
@endsection