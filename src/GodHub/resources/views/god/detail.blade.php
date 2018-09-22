@extends('layouts.app')

@section('content')

<h4>累計崇拝数　{{ $worshipSum }}</h4>

<button class="btn btn-outline-primary" onclick="location.href='{{ action('ScheduleController@create', $god['id']) }}'">スケジュール管理</button>

<form action="/god/detail/{{ $god['id'] }}/worship" method="POST">
    {{ csrf_field() }}
    @if($check)
        <input type="hidden" name="_method" value="PUT">
    @endif

        @if($check->status)
        <button type="submit" class="btn btn-primary">崇拝中</button>
        @else
        <button type="submit" class="btn btn-outline-primary">崇拝</button>
        @endif
</form>

<h2 class="display-3">{{ $god['name'] }}</h2>

<blockquote class="blockquote">
    <p class="mb-0">
        {!! nl2br($god['detail']) !!}
    </p>
</blockquote>
@endsection