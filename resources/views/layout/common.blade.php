<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bike-Map</title>

        <!-- css -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

        <!-- MapAPI -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
         <script type="text/javascript" charset="utf-8"
         src="http://js.api.olp.yahooapis.jp/OpenLocalPlatform/V1/jsapi?appid=dj00aiZpPXNNTUFzTGJsaTRFZiZzPWNvbnN1bWVyc2VjcmV0Jng9NGU-"></script>
        

        <!-- js -->
        <script type="text/javascript" charset="utf-8"
        src="http://js.api.olp.yahooapis.jp/OpenLocalPlatform/V1/jsapi?appid=dj00aiZpPXNNTUFzTGJsaTRFZiZzPWNvbnN1bWVyc2VjcmV0Jng9NGU-"></script>

        <!--<script src="{{ asset('/js/topmap.js') }}"></script>-->

        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    <body>
        @include('parts.header')
        @yield('content')
        @include('parts.footer')
    </body>
</html>