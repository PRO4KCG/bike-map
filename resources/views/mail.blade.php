@extends('layout.common')

@section('content')
<!--メール画面-->
<h2>メール投稿画面</h2>
<div class="container">
    <form>
        <!--名前フォーム-->
        <div class="form-group">
            <label for="name">氏名</label>
            <input type="text" class="form-control" id="name" placeholder="バイク太郎">
        </div>

        <!--UserIDフォーム-->
        <div class="form-group">
            <label for="userid">UserID</label>
            <input type="text" class="form-control" id="userid" placeholder="bike-taro">
        </div>

        <!--場所名フォーム-->
        <div class="form-group">
            <label for="message">場所名</label>
            <textarea id="spotname" name="spotname" rows="8" cols="80" class="form-control"placeholder="琵琶湖"></textarea>
        </div>
    </form>
</div>
@endsection