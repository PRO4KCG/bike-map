@extends('layout.common')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/postscreen.css') }}">
</head>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2>ユーザー投稿</h2>

            <p> <a href="{{ url('/newpost') }}"><button type="button" class="btn btn-primary ">投稿画面</button></a></p>

        </div>
    </div>
    <!--
    <div class="card">
    
  
        <div class="card-body">
            @foreach ($postResults as $post)
            
            <li class="list-group-item">
            <div class=""> 
                <img src="http://placehold.jp/300x200.png">
                </div>
               
                <img class="card-img-top" src="http://placehold.jp/300x200.png" alt="Card image cap">
                <h4 class="card-title">{{ $post->title }}</h4>
                <p class="card-text">{{ $post->comment }}</p>
              
               
                <form action="/postscreen" method="post">
                    @csrf
                    <button type="submit" class="card-link btn text-danger " name="like" value="{{ $post->favLocID }}"><i class="fas fa-heart "></i>  <span>{{ $post->rating }}</span></button>
                </form>

              
            @endforeach
            </li>

        </div>
    </div>-->

    <div class="card">
        @foreach ($postResults as $post)
        <div class="row no-gutters">
            <div class="col-md-4">
                @isset($post->images1)
                <div class="text-center">
                    <img src="/storage/img/{{ $post->images1 }}" class="img-fluid">
                    </div>
                @endisset
                @empty($post->images1)
                <div class="text-center">
                    <img src="https://placehold.jp/320x240.png" class="img-fluid">
                    </div>
                @endempty
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <span>userID</span>
                    <span>投稿日時：〇〇〇</span>
                    <br>
                    <span>場所名</span>
                    <h4 class="card-title">{{ $post->title }}</h4>
                    <p class="card-text">{{ $post->comment }}</p>
                  
                        <form action="/postscreen" method="post" class="form-inline">
                            @csrf
                            @method('patch')
                            <button type="submit" class="card-link btn text-danger " name="like" value="{{ $post->favLocID }}"><i class="fas fa-heart "></i> <span>{{ $post->rating }}</span></button>
                        </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection