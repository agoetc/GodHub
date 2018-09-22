@extends('layouts.app')

@section('content')
    <h1 class="display-3">崇拝ルーティーン</h1>


    <form action="{{ action('ScheduleController@post', $god['id']) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>曜日</label>
            <select name="week" class="custom-select">
                <option selected="">選択してください</option>
                <option value="月">月</option>
                <option value="火">火</option>
                <option value="水">水</option>
                <option value="木">木</option>
                <option value="金">金</option>
                <option value="土">土</option>
                <option value="日">日</option>
            </select>
        </div>
        <div class="form-group">
            <label>時間</label>
            <input name="time" class="form-control" placeholder="00:00" id="comment">
        </div>

        <div class="form-group">
            <label>崇拝内容</label>
            <textarea name="do" class="form-control" rows="5"placeholder=""  id="comment"></textarea>
        </div>

        <button type="submit" class="btn btn-outline-primary">送信</button>


    </form>
@endsection