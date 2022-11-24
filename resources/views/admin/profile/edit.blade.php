@extends('admin.admin')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('edit-profile',$user->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <img src="{{asset('upload/image/profile/'.$user->image)}}" width="50" height="50"
                                        value="{{$user->image}}" name="image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Phone</label>
                                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row" hidden>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Role</label>
                                        <input type="text" name="role_as" value="{{ $user->role_as }}"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="mr-3">Gender: </label>
                                    <input class="mr-1" type="radio" value="Male" {{ $user->gender == 'Male' ?
                                    'checked': ''}} id="male" name="gender">
                                    <label class="mr-3" for="male">Male</label>
                                    <input class="mr-1" type="radio" {{ $user->gender == 'Female' ? 'checked': ''}}
                                    value="Female" id="female" name="gender">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">DOB</label>
                                        <input type="date" name="d_o_b" value="{{ $user->d_o_b }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">City</label>
                                        <input type="text" name="city" value="{{ $user->city }} " class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Address</label>
                                        <input type="text" name="address" value="{{ $user->address }} " class="
                                        form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">state</label>
                                        <input type="text" name="state" value="{{ $user->state }} "
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        <input type="text" name="country" value="{{ $user->country }} " class="
                                        form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Postal Code</label>
                                        <input type="text" name="zip_code" value="{{ $user->zip_code }} " class="
                                        form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <div class="form-group">
                                            {{-- <label class="bmd-label-floating"></label> --}}
                                            <textarea class="form-control" name="about"
                                                rows="5">{{ $user->about }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection