@extends('layout.common')
@section('content')
<head>
     <link rel="stylesheet" href="{{ asset('css/postscreen.css') }}">
</head>
<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <h2>新規投稿画面</h2>

    <form action="postscreen" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
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
                <br>
                <p>*画像は3枚まで</p>
                <input type="file" class="form-group file_upload" name="post_images[]" accept="image/gif,image/jpeg,image/png,image/webp" multiple>
            </div>
            <!--ファイル複数選択
            <input type="file" class="form-control" name="image1_file[]" multiple="multiple">
                            -->



            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCentered">投稿</button>
        </div>


        <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenteredLabel">投稿しますか？</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-primary"> <a class="btn-primary">投稿</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endsection