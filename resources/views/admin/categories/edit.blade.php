@extends('layouts.app')


@section('content')
@include('admin.includes.errorsvalidations')

    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="text-center">Update Category: <b>{{$editCat->categoryname}}</b></h3>
        </div>
        <br><br>
        <div class="panel-body">
            <form method="post" action="{{ route('category.update', ['id'=>$editCat->id]) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Category Name</label>
                <input id="categorytitle" class="form-control" type="text" value="{{$editCat->categoryname}}" name="categorytitle">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Category
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    
@endsection