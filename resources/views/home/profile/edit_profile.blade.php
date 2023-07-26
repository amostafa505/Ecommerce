@extends('home.master')
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
                    <div class="card"><h3 class="text-center"><span class="text-danger">Hi...</span><strong>{{Auth::user()->name}}</strong> Update Your Information</h3></div>
                    <div class="card-body">
                    <form action="{{route('update.profile')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label class="info-title" for="email">Email Address <span>*</span></label>
                                <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control unicase-form-control text-input" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="Name">Name <span>*</span></label>
                                <input type="text" id="Name" name="name" value="{{$user->name}}" class="form-control unicase-form-control text-input" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="phone">Phone Number <span>*</span></label>
                                <input type="text" id="phone" name="phone" value="{{$user->phone}}" class="form-control unicase-form-control text-input" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="email">Profile Picture <span>*</span></label>
                                <input type="file" name="profile_photo_path" id="img" class="form-control">
                            </div>
                            <div>
                                <img id="showimg" src="{{ !empty($user->profile_photo_path) ? url('uploads/user_images/' . $user->profile_photo_path) : url('uploads/no_image.jpg') }}"  style="height: 100px; width:100px; border-radius:50%" alt="Profile_image">
                            </div>
<br>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Now</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#img').change(function(e){
                var reader = new FileReader();
                reader.onload = (function(e){
                    $('#showimg').attr('src' , e.target.result);
                });
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
