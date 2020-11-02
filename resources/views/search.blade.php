@extends('layout.common')
@section('content')
<script>

let dest = @json($result);

console.log(typeof(dest));
console.log(dest);


</script>
<script src="{{ asset('/js/weather.js') }}"></script>
<script src="{{ asset('/js/Mapping.js') }}"></script>

        <div class="container-fluid">
            <!--検索フォーム-->
            <div class="spot-serch">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="地名入力">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">検索</button>
                        </span>
                </div>
            </div>
            <br>

            
            <div id="mapid" style="width: 100%;height: 600px;"></div>
         </div>
    
         <!--
            <button class="start">出発地</button>
                <input type="text" id="input_messageS" value="">

         <button class="Routing">経路探索</button>
    --> 
         <button onClick="GetLocate()" id="GetLocate">現在地の取得</button>
            <button type="button" class="btn btn-primary" onClick="NaviStart()">ナビ開始</button>
            
            @include('weather')
@endsection
