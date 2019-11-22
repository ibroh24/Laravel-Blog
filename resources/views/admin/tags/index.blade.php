@extends('layouts.app')


@section('content')

<table class="table table-striped table-hover">
    <thead class="thead-light">
        <tr>
            <th>Action</th>
            {{-- <th>Tag ID</th> --}}
            <th>Tag Name</th>
        </tr>
    </thead>
    <tbody>
        @if ($tags->count() > 0)
            @foreach ($tags as $tagVal)
                <tr>
                    <td>
                        <a href="{{ route('tag.destroy', ['id'=>$tagVal->id]) }}" class="btn btn-sm btn-danger glyphicon glyphicon-pencil">X</a> <span>|</span>
                        <a href="{{ route('tag.edit', ['id'=>$tagVal->id]) }}" class="btn btn-sm btn-success">Edt</a> 
                    </td>
                    {{-- <td>{{$tagVal->id}}</td> --}}
                    <td>{{$tagVal->tag}}</td>
                </tr>
            @endforeach
        @else
        <tr>
            <th colspan="5" class="text-center">
                <h4> There is no Tag Yet</h4>
            </th>
        </tr>
            
        @endif
            
    </tbody>
</table>
    
@endsection