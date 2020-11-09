@extends('layout.common')

@section('content')
<div class="container">
    <div class="card">
         <div class="card-body">
    <h2><p>ユーザー投稿</p></h2>
     
   <p> <a href="{{ url('/newpost') }}"><button type="button" class="btn btn-primary ">投稿画面</button></a></p>

</div>
   </div>
    <div class="card">
        <div class="card-body">
            @foreach ($postResults as $post)
            <li class="list-group-item">
                <h4 class="card-title">{{ $post->title }}</h4>
                <p class="card-text">{{ $post->comment }}</p>
                <form action="/postscreen" method="post">
                    @csrf
                    <button type="submit" class="card-link btn text-danger " name="like" value="{{ $post->favLocID }}"><i class="fas fa-heart "></i>  <span>{{ $post->rating }}</span></button>
                </form>

              
            @endforeach
            </li>

        </div>
    </div>
</div>
@endsection