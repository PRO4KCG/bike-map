    @extends('layout.common')
    @section('content')
    <script src="{{ asset('/js/topmap.js') }}"></script>
                <div class="container">
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
                <div id="mapid" style="width: 100%;height: 600px;"></div>
        
    @endsection