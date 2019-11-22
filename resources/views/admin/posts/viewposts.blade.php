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
        @if ($allPost->count()>0)
            @foreach ($allPost as $post)
            <tr>
                <td>
                    <a href="{{ route('post.destroy', ['id'=>$post->id]) }}" class="btn btn-sm btn-danger glyphicon glyphicon-pencil">X</a> <span>|</span>
                    <a href="{{ route('post.edit', ['id'=>$post->id]) }}" class="btn btn-sm btn-success">Edt</a> 
                </td>
                <td><img src="{{asset($post->featured)}}" alt="{{$post->slug}}" width="70px" height="70px"></td>
                <td>{{$post->posttitle}}</td>
                <td>{{$post->postcontent}}</td>
                
            </tr>
            @endforeach
        @else
        <tr>
            <th class="text-center">There is no Posts to View</th>
        </tr>
            
        @endif
    </tbody>
</table>
    
@endsection