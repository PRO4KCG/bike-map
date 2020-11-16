@extends('layout.common')
@section('content')
<!--メインソース-->
<?php

    //phpinfo();


    //Unable to guess the MIME type as no guessers are available (have you enabled the php_fileinfo extension?).
?>
<div class="container">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <div class="row paddingfive">
        <!--プロフィール-->
        <div class="col-md-5 col-sm-12">
            <div class="card ">
                <div class="card-header  badge badge-primary" style="text-align:center;">
                    <h2 class="p-1">プロフィール</h2>
                </div>
                <!--ユーザー名から写真まで-->
                <ul class="list-group list-group-flush">
                    <!--ユーザー名-->
                    <li class="list-group-item">
                        <span class="badge badge-light">
                            <h4>名前</h4>
                        </span>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="username" value="{{ Auth::user()->name }}">
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-light ">
                            <h4>メールアドレス</h4>
                        </span>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="bike@email.com" value="{{ Auth::user()->email }}">
                    </li>
                    <!--bikeの車種名-->
                    <li class="list-group-item">
                        <span class="badge badge-light">
                            <h4>バイクの車種</h4>
                        </span>
                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="CBR" value="{{ Auth::user()->bikeName }}">
                        <!--ボタン-->
                        <div class="text-md-center text-right paddingfive p-2">
                            <button type="button" class="btn btn-primary float-right">保存</button>
                        </div>
                    </li>
                    <!--bikeの画像-->
                    <li class="list-group-item">
                        <span class="badge badge-light">
                            <h4>バイク画像</h4>
                        </span>*3枚まで
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    画像1
                                </button>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <img src="/storage/img/{{ Auth::user()->favBikeImage1 }}">
                                    </div>
                                </div>
                                <div class="card">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        画像2
                                    </button>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="/storage/img/{{ Auth::user()->favBikeImage2 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        画像3
                                    </button>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img src="/storage/img/{{ Auth::user()->favBikeImage3 }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <img src="/storage/img/{{ Auth::user()->favBikeImage1 }}">
                        <img src="/storage/img/{{ Auth::user()->favBikeImage2 }}">
                        <img src="/storage/img/{{ Auth::user()->favBikeImage3 }}">
                    -->
                    </li>
                    <!-- バイク投稿フォーム-->
                    <div class="card-body">
                        <form action="mypage" method="post" enctype="multipart/form-data">
                            @csrf
                            <!--
                            <input type="text" class="col-md-12 form-control" placeholder="料理名を入力" name="dish">
                            -->
                            <!--ファイル複数選択
                            <input type="file" class="form-control" name="image1_file[]" multiple="multiple">
                        -->

                            <input type="file" class="form-control" name="images[]" multiple>
                            <!--
                            <input type="file" class="form-control" name="image2_file">
                            <input type="file" class="form-control" name="image3_file">
                            -->

                            <br>
                            <input type="submit" class="btn btn-primary float-right" value="投稿">
                        </form>
                    </div>
                </ul>
            </div>



               <a class="text-danger dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                <div style="text-align:center;">
                    {{ __('ログアウト') }}
                </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
        </div>
        <!--真ん中の空白-->
        <div class="col-md-2 col-sm-12">
            <br>
            <br>
            <br>
        </div>
        <!--投稿内容編集-->
        <div class="col-md-5 col-sm-12　">
            <div class="card" style="width:">
                <div class="card-header badge badge-primary">
                    <h2 class="p-1" style="text-align:center;">投稿内容編集</h2>
                </div>
                <ul class="list-group list-group-flush">
                @foreach ($postResults as $post)
                    <li class="list-group-item">
                        <div class="card" style="width:">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <div class="card-text">{{ $post->comment }}</div>
                               
                                <br>

                               
                                <div class="col-4"></div>
                                <form action="mypage" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="card-link btn btn-danger float-right">削除</button>
                                </form>

                                    <!--削除と編集の間に入れないと正常に配置できなかったためここ-->
                                    <!--<i class="fa fa-heart fa-lg" aria-hidden="true"><span>1</span></i>-->
                                     <div class="btn btn-primary">
                                    いいね数:
                                    <span>{{ $post->rating }}</span>
                                </div>
                                        <button type="submit" class="card-link btn btn-primary float-right">編集</button>
                                     
                                           
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!--
         バイク投稿フォーム 
        <form action="mypage" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" class="col-md-12 form-control" placeholder="料理名を入力" name="dish">
            <input type="file" class="form-control" name="image1_file">
            <input type="file" class="form-control" name="image2_file">
            <input type="file" class="form-control" name="image3_file">
            <input type="submit" class="btn btn-primary" value="投稿">
        </form>
        -->
    </div>
</div>
@endsection
