<div class="container-fluid">
    <div class="row">
        <div class="col col-md-7">
            <nav class="navbar navbar-expand-md  navbar-light bg-light">
                <button type="button" class="navbar-toggler " data-toggle="collapse" data-target="#bs-navi" aria-controls="bs-navi" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="bs-navi">
                    <!--usernameを右寄せ、スマホ版で折り畳み状態で表示-->
                    <ul class="navbar-nav">
                        <!--リスト横並び-->
                        <li class="nav-item"><a class="nav-link" href="/">ホーム</a></li>
                        <!--
						<li class="nav-item"><a class="nav-link" href="search">検索</a></li>
						-->
                        <li class="nav-item"><a class="nav-link" href="/login">ログイン</a></li>
                       <!-- <li class="nav-item"><a class="nav-link" href="/register">新規登録</a></li>-->
                        <li class="nav-item"><a class="nav-link" href="/postscreen">ユーザー投稿</a></li>
                        @if( Auth::check() )
                        <li class="nav-item"><a class="nav-link" href="/mypage">マイページ</a></li>
                        @endif
                        <!--ログアウトボタン-->
                        <!--
						<li class="nav-item"><a class="nav-link" href="mypage">マイページ</a></li
						-->
                    </ul>
                </div>
            </nav>
        </div>
<!--
        <div class="ml-auto">
        <div class="btn-group">
  <button type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  ゲスト
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button">ログアウト</button>
    <button class="dropdown-item" type="button">アカウント削除</button>
  </div>
</div>
</div>-->

        @guest
        @else
        <div class="ml-auto">
            <nav class="navbar">
                <!--<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#logout" aria-controls="bs-navi" aria-expanded="false" aria-label="Toggle navigation">-->
                    <!--<a href="{{ url('/mypage') }}">--><p>{{ Auth::user()->name }}</p><!--</a>-->
                <!--</button>-->
            </nav>
            <!--ログアウトボタン
            <div class="collapse navbar-collapse" id="logout">
                <a class="text-danger " href="{{ route('logout') }}" onclick="event.preventDefault();
																													 document.getElementById('logout-form').submit();">
                    <div style="text-align:center;">
                        {{ __('ログアウト') }}
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            -->
            <!--
        	<li class="nav-item dropdown" style="  list-style: none;">
            <a id="navbarDropdown " class="nav-link dropdown-toggle btn-lg" href="#" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="badge-pill dropdown-menu" aria-labelledby="navbarDropdown">
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
          </li>
  -->
            <!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
   {{ Auth::user()->name }}
</button>


<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3Label">ログアウトしますか</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
-->
        </div>

        @endguest
    </div>
    <!--</header>-->
</div>