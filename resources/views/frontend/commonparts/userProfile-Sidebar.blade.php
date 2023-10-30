@php
    $user = Auth::user();
@endphp
<br>
<img src="{{!empty($user->profile_photo_path) ? url('uploads/user_images/'. $user->profile_photo_path):url('uploads/no_image.jpg')}}" alt="" class="card-img-top" style="border-radius:50%" height="100%" width="100%">
<br><br>
<ul class="list-group list-group-flush">
    <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
    <a href="{{route('edit.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
    <a href="{{route('user.orders')}}" class="btn btn-primary btn-sm btn-block">My Orders</a>
    <a href="{{route('user.edit.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">logout</a>
</ul>
