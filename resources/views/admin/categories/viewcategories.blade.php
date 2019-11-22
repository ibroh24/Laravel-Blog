@extends('layouts.app')


@section('content')

<table class="table table-striped table-hover">
    <thead class="thead-light">
        <tr>
            <th>Action</th>
            <th>Category ID</th>
            <th>Category Name</th>
        </tr>
    </thead>
    <tbody>
        @if ($catKey->count() > 0)
            <?php $count = 1; ?>
            @foreach ($catKey as $catItem)
                <tr>
                    <td>
                        <a href="{{ route('category.destroy', ['id'=>$catItem->id]) }}" class="btn btn-sm btn-danger glyphicon glyphicon-pencil">X</a> <span>|</span>
                        <a href="{{ route('category.edit', ['id'=>$catItem->id]) }}" class="btn btn-sm btn-success">Edt</a> 
                    </td>
                    <td><?php echo $count++; ?></td>
                    {{-- <td>{{$catItem->id}}</td> --}}
                    <td>{{$catItem->categoryname}}</td>
                </tr>
            @endforeach
        @else
        <tr>
            <th colspan="5" class="text-center">
                <h4> There is no Category Yet</h4>
            </th>
        </tr>
            
        @endif
            
    </tbody>
</table>
    
@endsection