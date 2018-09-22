@extends('layouts.app')

@section('content')

    <button type="button" onclick="location.href='{{ action('GodController@edit', $god['id']) }}'" class="btn btn-primary btn-sm">神を洗練する</button>

<h4>累計崇拝数　{{ $worshipSum }}</h4>

<button class="btn btn-outline-primary" onclick="location.href='{{ action('ScheduleController@create', $god['id']) }}'">スケジュール管理</button>

<form action="/god/detail/{{ $god['id'] }}/worship" method="POST">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-outline-primary">崇拝</button>

</form>

<h2 class="display-3">{{ $god['name'] }}</h2>

<blockquote class="blockquote">
    <p class="mb-0">
        {!! nl2br($god['detail']) !!}
    </p>
</blockquote>
@endsection