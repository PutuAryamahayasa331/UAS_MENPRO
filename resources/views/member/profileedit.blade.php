@extends('guest.main')

@section('container')
<!-- edit-member-details -->
<section class="agent-details">
    <div class="auto-container">
        @if (session()->has('updateprofile'))
        <div class="alert alert-success alert-dismissible fade show text-center mx-auto col-4" role="alert">
            <small>{{ session('updateprofile') }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="agency-details-content">
            <div class="agents-block-one">
                <div class="inner-box mr-0 newone">
                    <div class="row clearfix">
                        <div class="col-lg-3">
                            @if (Auth()->user()->profile)
                            <img src="/img/profile/{{ Auth()->user()->profile }}" width="300" height="300" class="rounded" />
                            @else
                            <img src="{{ asset('images/resource/agency-details-1.jpg') }}" width="300" height="300" class="rounded" />
                            @endif
                        </div>
                        <div class=" col-lg-9">
                            <div class="content-box">
                                <form action="/profile-edit/{{ Auth()->user()->id }}" method="POST" class="default-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" id="name" name="name" required placeholder="Enter your full name" value="{{ old('name', Auth()->user()->name) }}" class="form-control-sm 
                                        @error('name')
                                        is-invalid
                                        @enderror" />
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Profile Image</label>
                                        <input type="file" id="profile" name="profile" placeholder="Enter image for your profile" value="{{ old('profile') }}" class="form-control @error('profile')
                                        is-invalid
                                        @enderror">
                                        @error('profile')
                                        <div class=" invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" id="email" name="email" required placeholder="Enter your email address" value="{{ old('email', Auth()->user()->email) }}" class="form-control-sm 
                                        @error('email')
                                        is-invalid
                                        @enderror" />
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" id="phone" name="phone" required placeholder="Enter your phone number" value="{{ old('phone', Auth()->user()->phone) }}" class="form-control-sm 
                                        @error('phone')
                                        is-invalid
                                        @enderror" />
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class=" form-group">
                                        <label>Description</label>
                                        <textarea type="text" placeholder="Tell us about yourself" id="desc" name="desc" class="form-control-sm 
                                        @error('desc')
                                        is-invalid
                                        @enderror">{{ old('desc', Auth()->user()->desc) }}</textarea>
                                        @error('desc')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group" style="margin-bottom: 70px">
                                        <label>City</label>
                                        <div class="select-box">
                                            <select class="wide" name="city" id="city">
                                                <option value="">Enter your city</option>
                                                @foreach ($cities as $city)
                                                @if (old('city') == $city->name)
                                                <option value="{{ $city->name }}" selected>
                                                    {{ $city->name }}
                                                </option>
                                                @elseif(Auth()->user()->city == $city->name)
                                                <option value="{{ $city->name }}" selected>
                                                    {{ $city->name }}
                                                </option>
                                                @else
                                                <option value="{{ $city->name }}">
                                                    {{ $city->name }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 70px">
                                        <label>Country</label>
                                        <div class="select-box">
                                            <select class="wide" name="country" id="country">
                                                <option value="">Enter your country</option>
                                                @foreach ($countries as $country)
                                                @if (old('country') == $country->name)
                                                <option value="{{ $country->name }}" selected>
                                                    {{ $country->name }}
                                                </option>
                                                @elseif(Auth()->user()->country == $country->name)
                                                <option value="{{ $country->name }}" selected>
                                                    {{ $country->name }}
                                                </option>
                                                @else
                                                <option value="{{ $country->name }}">
                                                    {{ $country->name }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div class="btn-box pull-right">
                                            <button type="submit" class="theme-btn btn-one">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- edit-member-details end -->
@endsection