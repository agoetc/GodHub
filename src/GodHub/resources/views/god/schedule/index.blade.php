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
            @foreach($mon as $s)
                <h6 class="card-title">{{ substr($s['time'], 0, 5) }}</h6>
                <p class="card-text">{{ $s['do'] }}</p>
            @endforeach
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-header">
            火
        </div>
        <div class="card-body">
            @foreach($tues as $s)
                <h6 class="card-title">{{ substr($s['time'], 0, 5) }}</h6>
                <p class="card-text">{{ $s['do'] }}</p>
            @endforeach
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-header">
            水
        </div>
        <div class="card-body">
            @foreach($wednes as $s)
                <h6 class="card-title">{{ substr($s['time'], 0, 5) }}</h6>
                <p class="card-text">{{ $s['do'] }}</p>
            @endforeach
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-header">
            木
        </div>
        <div class="card-body">
            @foreach($thurs as $s)
                <h6 class="card-title">{{ substr($s['time'], 0, 5) }}</h6>
                <p class="card-text">{{ $s['do'] }}</p>
            @endforeach
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-header">
            金
        </div>
        <div class="card-body">
            @foreach($fry as $s)
                <h6 class="card-title">{{ substr($s['time'], 0, 5) }}</h6>
                <p class="card-text">{{ $s['do'] }}</p>
            @endforeach
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-header">
            土
        </div>
        <div class="card-body">
            @foreach($satur as $s)
                <h6 class="card-title">{{ substr($s['time'], 0, 5) }}</h6>
                <p class="card-text">{{ $s['do'] }}</p>
            @endforeach
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-header">
            日
        </div>
        <div class="card-body">
            @foreach($sun as $s)
                <h6 class="card-title">{{ substr($s['time'], 0, 5) }}</h6>
                <p class="card-text">{{ $s['do'] }}</p>
            @endforeach
        </div>
    </div>


@endsection
