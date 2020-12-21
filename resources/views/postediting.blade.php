@extends('layout.common')
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/postscreen.css') }}">

</head>
<div class="container">
    <h2>投稿内容編集</h2>

    <form action="/mypage" method="post" enctype="multipart/form-data">
        @csrf
        @foreach($results as $result)
        <div class="card-body">
            <!--タイトルフォーム-->
            <div class="form-group">
                <label for="name">タイトル</label>
                <input type="text" class="form-control" id="title" name="Title" value="{{ $result->title }}">
            </div>
            <!--場所名フォーム-->
            <div class="form-group">
                <label for="userid">場所名</label>
                <!--
                <input type="text" class="form-control" id="spotname" name="Spotname" value="{{ $result->locationName }}">
                -->
                @if($result->locationID == 1)
                <input type="text" class="form-control" id="spotname" name="Spotname" value="{{ $result->name }}">
                @else
                <input type="text" class="form-control" id="spotname" name="Spotname" value="{{ $result->locationName }}">
                @endif
            </div>
            <!--本文フォーム-->
            <div class="form-group">
                <label for="text">本文</label>
                <textarea id="sentence" name="Sentence" rows="8" cols="80" class="form-control">{{ $result->comment }}</textarea>

                <div class="d-sm-flex p-3">
                    <div class="img-wrap col-sm-4">
                        <!--下4行ラジオボタン-->
                        <div class="custom-control custom-checkbox float-right">
                            <input type="checkbox" class="custom-control-input" id="custom-check-1" name="select1">
                            <label class="custom-control-label" for="custom-check-1">削除</label>
                        </div>


                        @isset($result->images1)
                        <img src="/storage/img/{{ $result->images1 }}" class="img-fluid">
                        @endisset
                        @empty($result->images1)
                        <img src="http://placehold.jp/320x240.png?text=NO%20IMAGE" class="img-fluid">
                        @endempty
                        <input type="file" class="form-control-file" id="inputFile" name="upImage1" accept="image/gif,image/jpeg,image/png,image/webp">
                    </div>

                    <div class="img-wrap col-sm-4">
                        <!--下4行ラジオボタン-->
                        <div class="custom-control custom-checkbox float-right">
                            <input type="checkbox" class="custom-control-input" id="custom-check-2" name="select2">
                            <label class="custom-control-label" for="custom-check-2">削除</label>
                        </div>


                        @isset($result->images2)
                        <img src="/storage/img/{{ $result->images2 }}" class="img-fluid">
                        @endisset
                        @empty($result->images2)
                        <img src="http://placehold.jp/320x240.png?text=NO%20IMAGE" class="img-fluid">
                        @endempty
                        <input type="file" class="form-control-file" id="inputFile" name="upImage2" accept="image/gif,image/jpeg,image/png,image/webp">
                    </div>

                    <div class="img-wrap col-sm-4">
                        <!--下4行ラジオボタン-->
                        <div class="custom-control custom-checkbox float-right">
                        
                            <input type="checkbox" class="custom-control-input" id="custom-check-3" name="select3">
                            <label class="custom-control-label" for="custom-check-3">削除</label>
                        </div>


                        @isset($result->images3)
                        <img src="/storage/img/{{ $result->images3 }}" class="img-fluid">
                        @endisset
                        @empty($result->images3)
                        <img src="http://placehold.jp/320x240.png?text=NO%20IMAGE" class="img-fluid">
                        @endempty
                        <input type="file" class="form-control-file" id="inputFile" name="upImage3" accept="image/gif,image/jpeg,image/png,image/webp">
                    </div>
                </div>

            </div>

            <!--ファイル複数選択
            <input type="file" class="form-control" name="image1_file[]" multiple="multiple">
                            -->


            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCentered">保存</button>
        </div>
        @endforeach

        <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenteredLabel">保存しますか？</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-primary"> <a class="btn-primary">保存</button></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection