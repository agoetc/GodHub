<!doctype html>
<html>
<head>
    @include('template.head')
</head>
<body>

<h1 class="display-3">{{ $god['name'] }}</h1>

<blockquote class="blockquote">
    <p class="mb-0">
        {!! nl2br($god['detail']) !!}
    </p>
</blockquote>


</body>
