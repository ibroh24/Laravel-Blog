@if (count($errors) > 0)
        <ul class="list-styled text-danger">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif