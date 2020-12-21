<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ファビコン表示 -->
        <link rel="shortcut icon" href="{{ asset('/favicon-96x96.ico') }}">
        <!--アップルタッチアイコン表示-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/bike-icon.png') }}">
        <title>Bike-Map</title>

        <!-- css -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

        <!-- MapAPI -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
       
        <!-- js -->
        <!--<script src="{{ asset('/js/topmap.js') }}"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <!--https://map.yahooapis.jp/search/local/V1/localSearch-->
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        
    </head>
    <body>
        @include('parts.header')
        @yield('content')
        @include('parts.footer')
    </body>
</html>