@extends('layout.common')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--<div class="card-header">ダッシュボード</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログインしています！
                </div>-->
                <div class="card-header">ログイン中</div>

        <div class="card-body">
            <div class="d-flex justify-content-around">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <div class="btn btn-danger">
                        {{ __('ログアウト') }}
                    </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                <div class="btn btn-danger">
                    {{ __('アカウント削除') }}
                </div>
                </div>
                </div>
                
            </div>
         
            </div>
        </div>
    </div>
</div>
@endsection
