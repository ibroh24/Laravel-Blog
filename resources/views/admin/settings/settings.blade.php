@extends('layouts.app')


@section('content')

@include('admin.includes.errorsvalidations')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Edit Blog Settings</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('setting.update') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input id="siteName" class="form-control" type="text" value="{{$settings->siteName}}" name="siteName">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="contactEmail" value="{{$settings->contactEmail}}">
                </div>
                <div class="form-group">
                    <label for="password">Number</label>
                    <input id="contactNumber" class="form-control" type="text" value="{{$settings->contactNumber}}" name="contactNumber">
                </div>
                <div class="form-group">
                    <label for="password">Address</label>
                    <input id="address" class="form-control" type="text" value="{{$settings->address}}" name="address">
                </div>
            
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Site Settings
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection