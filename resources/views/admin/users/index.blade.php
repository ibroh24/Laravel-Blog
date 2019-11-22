@extends('layouts.app')


@section('content')

<h2>Users Table</h2>
<table class="table table-striped table-hover">
    <thead class="thead-light">
        <tr>
            <th>Action</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Permission</th>
            {{-- <th></th> --}}            
        </tr>
    </thead>
    <tbody>
        @if ($users->count()>0)
            @foreach ($users as $user)
            <tr>
                <td>
                    @if (Auth::id() != $user->id)
                        <a href="{{ route('user.destroy', ['id'=>$user->id]) }}" class="btn btn-sm btn-danger glyphicon glyphicon-pencil">X</a> <span>|</span>
                        
                    @endif
                    <a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="btn btn-sm btn-success">Edt</a>
                </td>
                <td><img src="{{asset($user->profile->avatar)}}" alt="{{$user->slug}}" width="70px" height="60px"></td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if ($user->admin)
                    <a href="{{ route('user.notadm', ['id'=>$user->id]) }}" class="btn btn-sm btn-danger">Remove as Admin</a>
                    @else
                    <a href="{{ route('user.admin', ['id'=>$user->id]) }}" class="btn btn-sm btn-success">Make Admin</a>
                    @endif
                </td>
                
            </tr>
            @endforeach
        @else
        <tr>
            <th class="text-center">There is no users to View</th>
        </tr>
            
        @endif
    </tbody>
</table>
    
@endsection