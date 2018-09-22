@extends('layouts.app')

@section('content')
    <h3>
        {{ $god['name'] }}様崇拝スケジュール
        <button class="btn btn-outline-primary" onclick="location.href='{{ action('ScheduleController@add', $god['id']) }}'">スケジュール追加</button>

    </h3>
    <div class="card">
        <div class="card-header">
            月
        </div>
        <div class="card-body">
            <h6 class="card-title">00:00</h6>
            <p class="card-text">クソリプ送信</p>
        </div>
    </div>
@endsection