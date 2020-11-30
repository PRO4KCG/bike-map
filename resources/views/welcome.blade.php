    @extends('layout.common')
    @section('content')

    <head>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <!--ファビコン-->
        <link rel="shortcut icon" href="{{ asset('/favicon-96x96.ico') }}">
    </head>
    <script>
        let tr = @json($topResult);
    </script>
    <script src="{{ asset('/js/topmap.js') }}"></script>
    <script src="{{ asset('/js/mapscroll.js') }}"></script>
    <div class="container-fluid">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <!--検索フォーム-->
        <div class="row">
            <form action="/search" method="post" class="col-sm-12">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="地名入力" name="place">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">検索</button>
                    </span>
                </div>
            </form>
        </div>
        <br>
        <div class="map">
            <div id="mapid" style="width: 100%;height: 600px;"></div>
        </div>

        @endsection