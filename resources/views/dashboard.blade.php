@extends('frontend.master')
@section('content')

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img src="{{!empty($user->profile_photo_path) ? url('uploads/user_images/'. $user->profile_photo_path):url('uploads/no_image.jpg')}}" alt="" class="card-img-top" style="border-radius:50%" height="100%" width="100%">
                    <br><br>
                    <ul class="list-group list-group-flush">
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('edit.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{route('user.edit.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">logout</a>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card"><h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong> Welcome To Ecommerce Shop</h3></div>
                </div>
            </div>
        </div>
    </div>


@endsection
