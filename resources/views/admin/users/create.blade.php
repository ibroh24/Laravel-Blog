@extends('layouts.app')


@section('content')

@include('admin.includes.errorsvalidations')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Create a New User</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('user.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password">
                </div>
                {{-- <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input id="password" class="form-control" type="password" name="cpassword">
                </div> --}}
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Add User
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection