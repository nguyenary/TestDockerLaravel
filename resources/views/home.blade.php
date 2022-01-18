<h1>Create Post</h1>

@if (isset($errors))
    @foreach($errors as $e)
         {{ $e[0] }}
    @endforeach
@endif
