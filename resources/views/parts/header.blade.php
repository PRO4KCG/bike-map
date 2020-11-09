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
                        <li class="nav-item"><a class="nav-link" href="login">ログイン</a></li>
                        <li class="nav-item"><a class="nav-link" href="register">新規登録</a></li>
                        <li class="nav-item"><a class="nav-link" href="postscreen">ユーザー投稿</a></li>
                        <!--ログアウトボタン-->
                        <!--
						<li class="nav-item"><a class="nav-link" href="mypage">マイページ</a></li
						-->
                    </ul>
                </div>
            </nav>
        </div>
        @guest
        @else
        <div class="ml-auto">
            <nav class="navbar">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#logout" aria-controls="bs-navi" aria-expanded="false" aria-label="Toggle navigation">
                    <span>{{ Auth::user()->name }}</span>
                </button>
            </nav>
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
    <div class="row">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </div>
</div>
