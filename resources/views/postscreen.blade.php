@extends('layout.common')

@section('content')
  <div class="container">
        <h2>ユーザー投稿</h2>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">タイトル</h4>
                        <p class="card-text">概要表示</p>
                            <a href="#" class="card-link">評価ボタン</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">タイトル</h4>
                        <p class="card-text">概要表示</p>
                            <a href="#" class="card-link">評価ボタン</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">タイトル</h4>
                        <p class="card-text">概要表示</p>
                            <a href="#" class="card-link">評価ボタン</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">タイトル</h4>
                        <p class="card-text">概要表示</p>
                            <a href="#" class="card-link">評価ボタン</a>
                </div>
            </div>

        <!-- 1.モーダル表示のためのボタン --><br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-example">
            モーダルダイアログ表示
        </button>

        <!-- 2.モーダルの配置 -->
        <div class="modal" id="modal-example" tabindex="1">
            <div class="modal-dialog">

                <!-- 3.モーダルのコンテンツ -->
                <div class="modal-content">

                    <!-- 4.モーダルのヘッダ -->
                    <div class="modal-header">
                        <h3><label>投稿</label></h3>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                    <!-- 5.モーダルのボディ -->
                    <div class="modal-body">
                        <input class="form-control form-control-lg" type="text" placeholder="タイトル"><br>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="内容"></textarea>
                        </div>
                    </div>

                    <!-- 6.モーダルのフッタ -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                        <button type="button" class="btn btn-primary">保存</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection