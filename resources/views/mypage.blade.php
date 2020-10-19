@extends('layout.common')

@section('content')
<!--メインソース-->

<?php

    //phpinfo();


    //Unable to guess the MIME type as no guessers are available (have you enabled the php_fileinfo extension?).
?>

<div class="container">
    <div class="row paddingfive">
        <!--プロフィール-->
        <div class="col-md-5 col-sm-12">
            <div class="card" style="width:">
                <div class="card-header　badge badge-primary">
                    <h2 style="text-align:center;">プロフィール</h2>
                </div>
                <!--ユーザー名から写真まで-->
                <ul class="list-group list-group-flush">
                <!--ユーザー名-->
                    <li class="list-group-item">
                        <span class="badge badge-light "><h4>名前</h4></span>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="username" value="{{ Auth::user()->name }}">
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-light "><h4>メールアドレス</h4></span>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="bike@email.com" value="{{ Auth::user()->email }}">
                    </li>
                    <!--bikeの車種名-->
                    <li class="list-group-item">
                        <span class="badge badge-light"><h4>バイクの車種</h4></span>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="CBR" value="{{ Auth::user()->bikeName }}">
                    </li>
                    <!--bikeの画像-->
                    <li class="list-group-item">
                        <span class="badge badge-light"><h4>バイク画像</h4></span>*3枚まで
                        <img src="/storage/img/{{ Auth::user()->favBikeImage1 }}">
                        <img src="/storage/img/{{ Auth::user()->favBikeImage2 }}">
                        <img src="/storage/img/{{ Auth::user()->favBikeImage3 }}">
                        
                    </li>
                </ul>
            </div>
            
            <!--ボタン-->
            <div class="text-md-right text-right paddingfive">
                <button type="button" class="btn btn-primary">保存</button>
            </div>
            
        </div>

        <!--真ん中の空白-->
        <div class="col-md-2 col-sm-12"></div>

        <!--投稿内容編集-->
        <div class="col-md-5 col-sm-12　">
            <div class="card" style="width:">
                <div class="card-header　badge badge-primary">
                    <h2 style="text-align:center;">投稿内容編集</h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="card" style="width:">
                            <div class="card-body">
                                <h5 class="card-title">琵琶湖よかったです。</h5>        
                                <a href="#" class="card-link">評価ボタン</a>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="card" style="width:">
                            <div class="card-body">
                                <h5 class="card-title">大阪城に行きました</h5>       
                                <a href="#" class="card-link">評価ボタン</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- バイク投稿フォーム -->
        <form action="mypage" method="post" enctype="multipart/form-data">
            @csrf
            <!--
            <input type="text" class="col-md-12 form-control" placeholder="料理名を入力" name="dish">
            -->
            <input type="file" class="form-control" name="image1_file">
            <input type="file" class="form-control" name="image2_file">
            <input type="file" class="form-control" name="image3_file">
            <input type="submit" class="btn btn-primary" value="投稿">
        </form>
        
    </div>
</div>
@endsection