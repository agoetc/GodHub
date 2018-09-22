@extends('layouts.app')

@section('content')
<h1 class="display-3">{{ $god['name'] }}</h1>

<blockquote class="blockquote">
    <p class="mb-0">
        {!! nl2br($god['detail']) !!}
    </p>
</blockquote>
@endsection