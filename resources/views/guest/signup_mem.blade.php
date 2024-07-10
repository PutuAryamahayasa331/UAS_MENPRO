@extends('guest.main')

@section('container')
<!-- register-member-section -->
<section class="ragister-section sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                <div class="sec-title centred">
                    <h5>Hey, Hello!</h5>
                    <h2>Sign Up with HandyHelp</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Member</li>
                            <li data-tab="#tab-2"><a href="/signup_contractor" class="reg">Contractor</a></li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <form method="POST" action="/signup_member" class="default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}" />
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" required value="{{ old('username') }}" />
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
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
                                        <label>Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" required value="{{ old('phone') }}" />
                                        @error('phone')
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
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" id="confirm_password" name="confirm_password" required />
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Sign up</button>
                                    </div>
                                </form>
                                <div class="othre-text centred">
                                    <p>Already have an account? <a href="/login">Log in</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- register-member-section end -->
@endsection