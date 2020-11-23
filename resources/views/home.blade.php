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
                 
                <div class="btn btn-danger">
                    {{ __('ログアウト1') }}
                </div>
                <div class="btn btn-danger offset-3">
                    {{ __('ログアウト2') }}
                </div>
                 


                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
