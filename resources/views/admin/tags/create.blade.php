@extends('layouts.app')


@section('content')

@include('admin.includes.errorsvalidations')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Create a New Tag</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('tag.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Tag Title</label>
                    <input id="tagtitle" class="form-control" type="text" name="tag">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Add Tag
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection