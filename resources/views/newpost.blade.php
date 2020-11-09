@extends('layout.common')

@section('content')

<div class="container">
    <h2>新規投稿画面</h2>
        <form action="/newpost" method="post">
        @csrf
            <!--タイトルフォーム-->
            <div class="form-group">
                <label for="name">タイトル</label>
                <input type="text" class="form-control" id="title" name="Title">
            </div>

            <!--場所名フォーム-->
            <div class="form-group">
                <label for="userid">場所名</label>
                <input type="text" class="form-control" id="spotname" name="Spotname">
            </div>
            
            <!--本文フォーム-->
            <div class="form-group">
                <label for="text">本文</label>
                <textarea id="sentence" name="Sentence" rows="8" cols="80" class="form-control"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">投稿</button>
        </form>
@endsection