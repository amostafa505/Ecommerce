@extends('frontend.master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img src="{{!empty($user->profile_photo_path) ? url('uploads/user_images/'. $user->profile_photo_path):url('uploads/no_image.jpg')}}" alt="" class="card-img-top" style="height: 100px; width:100px; border-radius:50%">
                    <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="/" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="#" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{route('user.edit.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">logout</a>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card"><h3 class="text-center">Update Your Password</h3></div>
                    <div class="card-body">
                    <form action="{{route('user.update.password')}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label class="info-title" for="email">Current Password <span>*</span></label>
                                <input type="password" id="oldpassword" name="oldpassword" class="form-control unicase-form-control text-input" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Name">New Password <span>*</span></label>
                                <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Confirm Password' <span>*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" >
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Password</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
