@extends('frontend.frontend')

@section('content')
<div class="breacrumb-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcrumb-text">
          <a href="#"><i class="fa fa-home"></i>Home</a>
          <span>Profile</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container" style="margin-top: 20px">
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header p-3">
          <div style="display: flex; justify-content: space-between;margin-bottom: 20px;">
            <h4>Profile</h4>
            <a href="{{ route('user-edit-profile', Auth::user()->id) }}">
              <button class="btn btn-outline-primary"><i class='fa fa-edit'></i></button>
            </a>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">Full Name</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">DOB</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->d_o_b }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">Gender</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->gender }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">Phone</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">Address</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">City</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->city }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">State</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->state }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">Zip Code</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->zip_code }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-4">
              <p class="mb-0">Country</p>
            </div>
            <div class="col-sm-8">
              <p class="text-muted mb-0">{{ Auth::user()->country }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card mb-4">
        <div class="card-body text-center">
          @if (Auth::user()->image && File::exists(public_path("upload/image/profile/".Auth::user()->image)))
          <img src="{{ asset('upload/image/profile/'.Auth::user()->image) }}" class="rounded-circle img-fluid"
            style="width: 150px;">
          @else
          <img class="rounded-circle" src="{{ asset('frontend/img/demo.png') }}" alt="" style="width: 150px;" />
          @endif
        </div>
        <div class="card-body text-center">
          <p class="card-description about">
            {{ Auth::user()->about }}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection