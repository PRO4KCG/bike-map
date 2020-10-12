//const { result } = require("lodash");

var map = null;

const mapon = () =>{//html読み込み時にjsを処理
    map = L.map('mapid').setView([37.985358, 135.753331], 5);
    /*
    var routing = document.querySelector(".Routing");
    var startLocX = null;
    var startLocY = null;
    var endLocX = null;
    var endLocY = null;
    */
    let DestLat = Number(DestinationLat);
    let DestLon = Number(DestinationLon);
    let DestName = DestinationName;
    let MeLocationLat = null;
    let MeLocationLon = null;

    //var Ygeocoder = new Y.GeoCoder();

    //var start = document.querySelector(".start");

    var NaviStart = document.querySelector(".btn-primary");
    var getlocate = document.querySelector("#GetLocate");
   
    L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
      attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
    }).addTo(map);
     
    //目的地にピンを建てる
     let marker = L.marker([DestLat, DestLon]).addTo(map);
     marker.bindPopup(DestName).openPopup();


    //OpenWeatherMap天気予報API
    var owm_key = "39e545646eebdf1e60bcc141aa8fa102";

    //経路探索
    /*
    routing.onclick = () =>{
        L.Routing.control({
            waypoints: [
                L.latLng(startLocY, startLocX),
                L.latLng(endLocY, endLocX)
            ],
            routeWhileDragging: true
        }).addTo(map);
    }
    */

    /*
    //住所から緯度経度
    start.onclick = () =>{ 
        var input_message = document.getElementById("input_messageS").value;
            console.log(input_message)
            var request = { query : input_message};

            Ygeocoder.execute(request , function( ydf_data ){
                if ( ydf_data.features.length > 0 ) {
                    var latlng = ydf_data.features[0].latlng;
                
                    console.log("名称 : "+ ydf_data.features[0].name);
                    console.log("緯度 : "+ latlng.lat());
                    console.log("経度 : "+ latlng.lng());

                    startLocY = latlng.lat()
                    startLocX = latlng.lng()
                  }
            })
            
    }
    */
   //ナビ開始
   NaviStart.onclick = () => {
    L.Routing.control({
        waypoints: [
            L.latLng(MeLocationLat, MeLocationLon),
            L.latLng(DestLat, DestLon)
        ],
        routeWhileDragging: true
    }).addTo(map);
}

//現在地の取得
getlocate.onclick = () =>{
    map.on("locationerror",onLocationError);
    map.on("locationfound",onLocationFound);
    map.locate({
        setView:"true"
    });
}

function onLocationError(e){
    alert(e.message);
}

function onLocationFound(e){
    LocateMarker = L.marker(e.latlng).addTo(map);
    MeLocationLat = Number(e.latlng.lat);
    MeLocationLon = Number(e.latlng.lng);
}
}   
   
    //http://api.openweathermap.org/data/2.5/weather?lat={緯度}&lon={経度}&APPID={自分のAPIキー}
    

onload = mapon;