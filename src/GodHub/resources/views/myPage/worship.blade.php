
@extends('layouts.app')

@section('content')
    <h1 class="display-3">信仰する神</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                @foreach($worships as $w)
                    <div class="card">
                        <div class="card-header"><a href="{{ action('GodController@detail', $w->god->id) }}">{{ $w->god->name }}</a></div>
                        <div class="card-body">
                            <p>{{ $w->god->detail }}</p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
