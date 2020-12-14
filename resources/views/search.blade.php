@extends('layout.common')
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
</head>
<script>
    let dest = @json($result);
</script>
<script src="{{ asset('/js/weather.js') }}"></script>
<script src="{{ asset('/js/Mapping.js') }}"></script>
<script src="{{ asset('/js/mapscroll.js') }}"></script>

<div class="container-fluid">
    <!--検索フォーム-->
    <form action="/search" method="post" class="col-sm-12">
        @csrf
        <div class="spot-serch">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="地名入力" name="place">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default">検索</button>
                </span>
            </div>
        </div>
    </form>
    <br>

    <div class="map">
        <div id="mapid" style="width: 100%;height: 600px;"></div>
    </div>
</div>

@include('weather')
@endsection