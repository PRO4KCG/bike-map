<!DOCTYPE html>
<html lang="ja">
<head>
  <head>
    <meta charset="utf-8">
    <title>search</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
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
  </body>
</html>