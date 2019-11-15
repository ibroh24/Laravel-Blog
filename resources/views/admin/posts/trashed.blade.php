@extends('layouts.app')


@section('content')

<table class="table table-striped table-hover">
    <thead class="thead-light">
        <tr>
            <th>Action</th>
            {{-- <th>Image Link</th> --}}
            <th>Post Image</th>
            <th>Post Title</th>
            <th>Post Content</th>
            
        </tr>
    </thead>
    <tbody>
        @if ($trashPosts->count() >0)
            @foreach ($trashPosts as $post)
            <tr>
                <td>
                    <a href="{{ route('post.kill', ['id'=>$post->id]) }}" class="btn btn-sm btn-success glyphicon glyphicon-pencil">Del</a> <span>|</span>
                    <a href="{{ route('post.restore', ['id'=>$post->id]) }}" class="btn btn-sm btn-primary">Rstr</a> 
                </td>
                <td><img src="{{$post->featured}}" alt="{{$post->slug}}" width="70px" height="70px"></td>
                <td>{{$post->posttitle}}</td>
                <td>{{$post->postcontent}}</td>
                
            </tr>
            @endforeach
        @else
        <tr>
            <th colspan="5" class="text-center">
                <h4> There is no Trash Posts to View</h4>
            </th>
        </tr>
        @endif

        
    </tbody>
</table>
    
@endsection