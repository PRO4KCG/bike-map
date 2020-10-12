@extends('layout.common')

@section('content')
    <!--メインソース-->
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
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                       placeholder="username">
                            </li>
                              <!--メールアドレス-->
                            <li class="list-group-item">
                                <span class="badge badge-light "><h4>メールアドレス</h4></span>
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                       placeholder="bike@email.com">
                            <!--bikeの車種名-->
                            <li class="list-group-item">
                                <span class="badge badge-light"><h4>バイクの車種</h4></span>
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                       placeholder="CBR">
                            </li>
                            <!--bikeの画像-->
                            <li class="list-group-item">
                                <span class="badge badge-light"><h4>バイク画像</h4></span>*3枚まで

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
            </div>

        </div>
        @endsection