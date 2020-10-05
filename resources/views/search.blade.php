@extends('layout.common')

@section('content')
        <div class="container">
            <!--検索フォーム-->
            <div class="spot-serch">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="地名入力">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">検索</button>
                </span>
            </div>
        </div>

         <div id="mapid" style="width: 100%;height: 600px;"></div>
            <button class="start">出発地</button>
                <input type="text" id="input_messageS" value="">

         <button class="Routing">経路探索</button>

         <button onClick="GetLocate()">現在地の取得</button>
            <button type="button" class="btn btn-primary">ナビ開始</button>
            @endsection