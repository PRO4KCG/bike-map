@extends('layout.common')

@section('content')

<div class="container">
    <h2>投稿詳細ページ</h2>
    <div class="card-body">
        @foreach($results as $result)
        <div class="d-sm-flex p-3">
            <div class="img-wrap col-sm-4">
                @isset($result->images1)
                <img src="/storage/img/{{ $result->images1 }}" class="img-fluid">
                @endisset
                @empty($result->images1)
                <img src="http://placehold.jp/320x240.png?text=NO%20IMAGE" class="img-fluid">
                @endempty

            </div>

            <div class="img-wrap col-sm-4">
                @isset($result->images2)
                <img src="/storage/img/{{ $result->images2 }}" class="img-fluid">
                @endisset
                @empty($result->images2)
                <img src="http://placehold.jp/320x240.png?text=NO%20IMAGE" class="img-fluid">
                @endempty
            </div>

            <div class="img-wrap col-sm-4">
                @isset($result->images3)
                <img src="/storage/img/{{ $result->images3 }}" class="img-fluid">
                @endisset
                @empty($result->images3)
                <img src="http://placehold.jp/320x240.png?text=NO%20IMAGE" class="img-fluid">
                @endempty
            </div>
        </div>
        <p>
            <small>投稿ユーザー名：{{ $result->userName }}</small>
            <small>投稿日時：{{ $result->create }}</small>
        </p>

        <!--タイトル-->
        <p>{{ $result->title }}</p>

        <!--場所名-->
        @if($result->locationID == 1)
        <p>{{ $result->name }}</p>
        @else
        <p>{{ $result->locationName }}</p>
        @endif

        <!--本文-->
        <p>{{ $result->comment }}</p>
        @endforeach
    </div>
</div>




@endsection