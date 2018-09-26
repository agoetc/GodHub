@extends('layouts.app')

@section('content')
<h1 class="display-3">神作成。</h1>


<form action="/god/create/post" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label>神の名前</label>
        <input name="name" class="form-control" placeholder="例：アッラー"  id="comment"></input>
    </div>
    <div class="form-group">
        <label>詳細</label>
        <textarea name="detail" class="form-control" rows="10"placeholder="例：アッラー"  id="comment"></textarea>
    </div>

    <button type="submit" class="btn btn-outline-primary">送信</button>

</form>
@endsection