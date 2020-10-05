<!DOCTYPE html>
<html lang="ja">
<head>
  <head>
    <meta charset="utf-8">
    <title>larabasicweb</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!--メインソース-->
    <div class="container">
            <div class="row paddingfive">
                <!--プロフィール-->
                <div class="col-md-5 col-sm-12">
                    <div class="card" style="width:">
                        <div class="card-header　badge badge-primary">
                            <h2>プロフィール</h2>
                        </div>
                        <!--ユーザー名から写真まで-->
                        <ul class="list-group list-group-flush">
                            <!--ユーザー名-->
                            <li class="list-group-item">
                                <span class="badge badge-light "><h4>ユーザー名</h4></span>
                                <input type="text" class="form-control" aria-describedby="emailHelp"
                                       placeholder="user1">
                            </li>
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
                            <h2>投稿内容編集</h2>
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
  </body>
</html>