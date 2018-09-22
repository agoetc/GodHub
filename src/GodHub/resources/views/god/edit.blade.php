@extends('layouts.app')

@section('content')
    <form action="{{ action('GodController@update', $god->id )}}">
        <div class="form-group">
            <label for="formGroupExampleInput">新たな神の名</label>
            <input name="name" class="form-control" value="{{ $god->name }}" id="comment"></input>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">詳細</label>
            <textarea name="detail" class="form-control" rows="20" id="comment">{{ $god['detail'] }}</textarea>
        </div>

        <button type="submit"  class="btn btn-primary btn-sm">再誕</button>

    </form>




@endsection