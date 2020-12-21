@extends('layout.common')
@section('content')
<!--メインソース-->
<?php

//phpinfo();


//Unable to guess the MIME type as no guessers are available (have you enabled the php_fileinfo extension?).
?>

<head>
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    　
</head>
<script src="{{ asset('/js/mypage.js') }}"></script>

<script>
    /* アラートの表示 */
    function delete_alert(e) {
        if (!window.confirm('本当に削除しますか？')) {
            window.alert('キャンセルされました');
            return false;
        }
        document.deleteform.submit();
    };
</script>

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
                <form action="mypage" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!--ユーザー名から写真まで-->
                    <ul class="list-group list-group-flush">
                        <!--ユーザー名-->
                        <li class="list-group-item">
                            <span class="badge badge-light">
                                <h4>名前</h4>
                            </span>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="username" value="{{ Auth::user()->name }}" name="name">
                        </li>
                        <li class="list-group-item">
                            <span class="badge badge-light ">
                                <h4>メールアドレス</h4>
                            </span>
                            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="bike@email.com" value="{{ Auth::user()->email }}" name="email">
                        </li>
                        <!--bikeの車種名-->
                        <li class="list-group-item">
                            <span class="badge badge-light">
                                <h4>バイクの車種</h4>
                            </span>
                            <input type="text" class="form-control" aria-describedby="emailHelp" value="{{ Auth::user()->bikeName }}" name="bikeName">
                        </li>
                        <!--bikeの画像-->
                        <li class="list-group-item">
                            <span class="badge badge-light">
                                <h4>バイク画像</h4>
                            </span>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <!--<button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        画像
                                    </button>-->
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <img class="img-fluid" src="/storage/img/{{ Auth::user()->favBikeImage1 }}" onerror="this.onerror = null; this.src='';">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- バイク投稿フォーム-->
                        <div class="card-body">
                            <!--
                            <input type="text" class="col-md-12 form-control" placeholder="料理名を入力" name="dish">
                            -->
                            <!--ファイル複数選択
                            <input type="file" class="form-control" name="image1_file[]" multiple="multiple">
                        -->
                            <!--
                        <label>
                            <div class="word-break">
                                <input type="file" class="form-control" name="image" accept="image/gif,image/jpeg,image/png,image/webp">
                            </div>
                            </label>
                        -->


                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="image" accept="image/gif,image/jpeg,image/png,image/webp">
                                <label class="custom-file-label" for="customFile" data-browse="参照" name="image">ファイル選択...</label>
                            </div>

                            <script>
                                $('.custom-file-input').on('change', function() {
                                    $(this).next('.custom-file-label').html($(this)[0].files[0].name);
                                })
                            </script>

                            <!--
                            <input type="file" class="form-control" name="image2_file">
                            <input type="file" class="form-control" name="image3_file">
                            -->

                            <br>
                            <!--④マイページの保存と投稿を一纏めにするFB
                                -
                                -
                                -
                                -
                            -->
                            <input type="submit" class="btn btn-primary float-right" value="保存">
                </form>
            </div>
            </ul>
        </div>



        <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();" style="text-align:center;">
            <div class="btn btn-danger d-block btn-sm">
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
        <div class="card">
            <div class="card-header badge badge-primary">
                <h2 class="p-1" style="text-align:center;">投稿内容編集</h2>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($postResults as $post)
                <li class="list-group-item">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <div class="card-text">{{ $post->comment }}</div>

                            <br>


                            <div class="col-4"></div>
                            <form action="mypage" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <!--<div class="fli" value="{{ $post->favLocID }}" name="fli"></div>-->
                                <button type="submit" class="card-link btn btn-danger float-right position-top-10" data-toggle="modal" data-target="#exampleModalCentered" value="{{ $post->favLocID }}" name="fli" onClick="delete_alert(event);return false;">削除</button>
                                <!--
                                <div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenteredLabel">投稿を削除しますか？</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCentered">はい</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            -->
                            </form>

                            <!--削除と編集の間に入れないと正常に配置できなかったためここ-->
                            <!--<i class="fa fa-heart fa-lg" aria-hidden="true"><span>1</span></i>-->
                            <!--<button type="submit" class="card-link btn text-danger " name="like" value="{{ $post->favLocID }}"><i class="fas fa-heart "></i> <span>{{ $post->rating }}</span></button>-->
                            <!--<button type="submit" class="card-link btn btn-primary float-right" href="{{ url('/postediting') }}">編集</button>-->
                            <form action="/postscreen/{{ $post->favLocID }}/edit" method="post">
                                @csrf
                                <button type="submit" class="card-link btn btn-primary float-right">編集</button>
                            </form>
                            <button type="submit" class="card-link btn text-danger " name="like" value="{{ $post->favLocID }}"><i class="fas fa-heart "></i> <span>{{ $post->rating }}</span></button>
                        </div>
                </li>
                @endforeach
            </ul>
        </div>

           <div>                     
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                <a class="page-link" href="#!" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
                </li>
                <li class="page-item"><a class="page-link" href="#!">1</a></li>
                <li class="page-item"><a class="page-link" href="#!">2</a></li>
                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                <li class="page-item"><a class="page-link" href="#!">4</a></li>
                <li class="page-item"><a class="page-link" href="#!">5</a></li>
                <li class="page-item"><a class="page-link" href="#!">6</a></li>
                <li class="page-item">
                <a class="page-link" href="#!" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
                </li>
            </ul>
            </nav>
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
@endsection