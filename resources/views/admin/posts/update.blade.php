@extends('layouts.app')


@section('content')

@include('admin.includes.errorsvalidations')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Edit Post: {{$editPost->posttitle}}</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('post.update', ['id'=> $editPost->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Post Title</label>
                <input id="posttitle" class="form-control" type="text" value="{{$editPost->posttitle}}" name="posttitle">
                </div>

                <div class="form-group">
                    <label for="featured">Post Image</label>
                    <input id="featured" class="form-control" type="file" name="featured">
                </div>
                <div class="form-group">
                    <label for="content">Post Content</label>
                    <textarea id="content" class="form-control" name="postcontent" rows="5" cols="5">{{$editPost->postcontent}}</textarea>
                </div>
                <div class="form-group">
                    <label for='tags'>Select Tag:</label>
                    @foreach ($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" value="{{$tag->id}}" name="tags[]" 
                                @foreach ($editPost->tags as $assoc)
                                    @if ($tag->id == $assoc->id)
                                        checked    {{--disabled --}}
                                    @endif
                                @endforeach
                            > {{$tag->tag}}</label>
                            
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                        <label for="categoryid">Select Post Category</label>
                        <select id="categoryid" class="custom-select" value="{{$editPost->postCategory}}" name="categoryid">
                            @foreach ($catKey as $item)
                            <option value="{{$item->id}}"
                                @if ($editPost->item == $item->id)
                                    selected
                                @endif
                            >{{$item->categoryname}}</option>    
                            @endforeach  
                        </select>
                    {{-- </div> --}}
                </div>
                
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Post
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection