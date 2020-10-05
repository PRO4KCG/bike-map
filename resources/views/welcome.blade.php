    @extends('layout.common')
    @section('content')
                <div class="container">
    <!--検索フォーム-->
                <div class="spot-serch m-b-md">
                    <div class="input-group">
                        <form action="search/" method="get">
	                    <input type="text" class="form-control" placeholder="地名入力" name="place">
	                        <span class="input-group-btn">
		                        <button type="button" class="btn btn-default">検索</button>
	                        </span>
                        </form>
                    </div>
                </div>
                <div id="mapid" style="width: 100%;height: 600px;"></div>
            </div>
    @endsection