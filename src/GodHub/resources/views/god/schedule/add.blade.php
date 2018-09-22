@extends('layouts.app')

@section('content')
    <h1 class="display-3">崇拝ルーティーン</h1>


    <form action="/god/create/post" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>曜日</label>
            <select class="custom-select">
                <option selected="">Open this select menu</option>
                <option value="1">月</option>
                <option value="2">火</option>
                <option value="3">水</option>
                <option value="4">木</option>
                <option value="5">金</option>
                <option value="6">土</option>
                <option value="7">日</option>

            </select>

        </div>
        <div class="form-group">
            <label>時間</label>
            <textarea name="detail" class="form-control" rows="1"placeholder="00:00"  id="comment"></textarea>
        </div>

        <div class="form-group">
            <label>崇拝</label>
            <textarea name="detail" class="form-control" rows="20"placeholder=""  id="comment"></textarea>
        </div>

        <button type="submit" class="btn btn-outline-primary">送信</button>


    </form>
@endsection