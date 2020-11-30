@extends('layout.common')
@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/postscreen.css') }}">
   
</head>
<div class="container">
    <h2>投稿内容編集</h2>
    
    <form action="/newpost" method="post">
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

            <div class="d-sm-flex p-3">
             <div class="img-wrap col-sm-4">
            <button class="close">&times;</button>
                <img class="img-fluid " src="https://placehold.jp/320x240.png">
                        <input type="file" class="form-control-file" id="inputFile">
                </div>

            <div class="img-wrap col-sm-4">
            <button class="close">&times;</button>
                <img class="img-fluid" src="https://placehold.jp/320x240.png">
                <input type="file" class="form-control-file" id="inputFile">
                     </div> 

             <div class="img-wrap col-sm-4">
            <button class="close">&times;</button>
                <img class="img-fluid" src="https://placehold.jp/320x240.png">
                <input type="file" class="form-control-file" id="inputFile">
                     </div>
                     </div>
         <style>
         .img-wrap {

}
.img-wrap .close {

}
    </style>
              <label>
                 <!--ファイルを選択<input type="file"  class="form-control-file file_upload" name="image1_file">-->
                </label>

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
                        <button type="submit" class="btn btn-primary"> <a class="btn-primary" href="{{ url('/postscreen') }}">投稿</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endsection
