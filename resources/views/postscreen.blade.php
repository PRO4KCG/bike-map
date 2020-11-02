@extends('layout.common')

@section('content')
<div class="container">
    <h2>ユーザー投稿</h2>
    <a href="{{ url('/newpost') }}"><button type="button" class="btn btn-primary">投稿画面</button></a>
    <div class="card">
        <div class="card-body">
            @foreach ($postResults as $post)
                <h4 class="card-title">{{ $post->title }}</h4>
                <p class="card-text">{{ $post->comment }}</p>
                <a href="#" class="card-link">いいねボタン</a>
                <p>{{ $post->rating }}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection