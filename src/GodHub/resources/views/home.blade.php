
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($gods as $god)
            <div class="card">
                <div class="card-header"><a href="{{ action('GodController@detail', $god->id) }}">{{ $god->name }}</a></div>
                <div class="card-body">
                    <p>{{ $god->detail }}</p>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
