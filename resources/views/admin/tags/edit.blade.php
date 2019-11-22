@extends('layouts.app')


@section('content')

@include('admin.includes.errorsvalidations')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Edit Tag: {{$tagEdit->tag}} </h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('tag.update', ['id'=>$tagEdit->id ]) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Tag Title</label>
                    <input id="tagtitle" class="form-control" type="text" value="{{$tagEdit->tag}}" name="tag">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Tag
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection