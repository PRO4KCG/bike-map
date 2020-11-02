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
    let DestLat;
    let DestLon;
    //let DestName = DestinationName;
    let markers = [];
    var weatherHTML = document.querySelector(".weather");
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
    for(let i = 0; i < Object.keys(dest).length; i++) {
        DestLat = dest[i]["latitude"];
        DestLon = dest[i]["longitude"];
        markers[i] = L.marker([DestLat, DestLon]).addTo(map).on('click',function(e) { clickEvent(e); } );
        markers[i].bindPopup(L.popup({
            //closeOnClick: true,
            autoClose: false
        }).setContent(dest[i]["locationName"])).openPopup();
        markers[i].id = dest[i]["locationID"];
        markers[i].name = dest[i]["locationName"];
        markers[i].latitude = DestLat;
        markers[i].longitude = DestLon;
        markers[i].number = i;
    }
    
    //クリックイベントで発火する関数
    function clickEvent(e){
        //alert( e.target.latitude + ": "+ e.target.longitude);
        window.location = "/search/"+e.target.id;
        alert(e.target.name + "が選択されました");
        
        DestLat = e.target.latitude;
        DestLon = e.target.longitude;
        console.log("number:"+e.target.number);
        console.log(markers);

        let currentMarkers = [];

        for(let i = 0; i < markers.length; i++) {
            map.removeLayer(markers[i]);
            if(e.target.number == i) {
                currentMarkers = markers[i]
            }//console.log(test);
    
        }
        let marker = L.marker([currentMarkers.latitude, currentMarkers.longitude]).addTo(map);
        marker.bindPopup(currentMarkers.name).openPopup();
        //map.removeLayer(markers[e.target.number]);
        //marker = L.marker([DestLat, DestLon]).addTo(map);
        //marker.bindPopup(e.target.name).openPopup();
        //map.panTo(e.latlng);
        
    }

    

    //OpenWeatherMap天気予報API
    //var owm_key = "39e545646eebdf1e60bcc141aa8fa102";

    console.log("配列長さ："+markers.length);
    if(markers.length == 1){
    fetch('http://api.openweathermap.org/data/2.5/onecall?lat='+DestLat+'&lon='+DestLon+'&lang=ja&APPID=39e545646eebdf1e60bcc141aa8fa102')
    .then(function(response){
        return response.json();
    }).then(function(json){
        jsonArray = JSON.stringify(json);
        data = JSON.parse(jsonArray);
        //console.log("json中身:"+JSON.stringify(json));

        for(var i = 0; i <= 6; i++){

            var weat = data['daily'][i]['weather'][0]['main'];  //その日の天気の取得
            var icon = data['daily'][i]['weather'][0]['icon'];  //天気画像の取得
            var utc = data['daily'][i]['dt'];   //日付の取得(UTC方式)

            // UTC時間を日本時間に変換 
            var date = new Date( utc * 1000 );
            var month = date.getMonth() + 1;
            var day = date.getDate();

           
            // HTMLでの表示 
            weatherHTML.innerHTML += '<div class="day">' + month + '月' + day + '日<br>'+
                                     weat +'<br>'+
                                     "<img src='http://openweathermap.org/img/wn/"+icon+"@2x.png'></img></div>";

        }
    })
}
    /*
     let marker = L.marker([DestLat, DestLon]).addTo(map);
     marker.bindPopup(DestName).openPopup();
    */

    

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