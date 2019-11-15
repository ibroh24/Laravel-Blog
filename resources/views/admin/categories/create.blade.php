@extends('layouts.app')


@section('content')

@include('admin.includes.errorsvalidations')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="text-center">Create a New Category</h2>
        </div>
        <div class="panel-body">
            <form method="post" action="{{ route('category.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Category Title</label>
                    <input id="categorytitle" class="form-control" type="text" name="categorytitle">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Add Category
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection