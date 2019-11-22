@extends('layouts.app')


@section('content')

@include('admin.includes.errorsvalidations')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Update Your Profile</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                <input id="name" class="form-control" type="text" value="{{$user->name}}" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" value="{{$user->email}}" name="email">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" class="form-control" type="password" name="password">
                </div>
                <div class="form-group">
                    <label for="avatar">Upload New Avatar</label>
                    <input id="avatar" class="form-control" type="file" name="avatar">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook Link</label>
                    <input id="facebook" class="form-control" type="text" value="{{$user->profile->facebook}}" name="facebook">
                </div>
                <div class="form-group">
                    <label for="youtube">YouTube Link</label>
                    <input id="youtube" class="form-control" type="text" value="{{$user->profile->youtube}}" name="youtube">
                </div>
                <div class="form-group">
                    <label for="facebook">About</label>
                    <textarea class="form-control" name="about" id="about" cols="6" rows="6" >{{$user->profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Profile
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection