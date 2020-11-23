

var map = null;


const mapon = () => {//html読み込み時にjsを処理
    map = L.map('mapid');
    let DestLat;
    let DestLon;
    let markers = [];
    var weatherHTML = document.querySelector(".weather");
    let MeLocationLat = null;
    let MeLocationLon = null;



    var NaviStart = document.querySelector(".btn-primary");
    var getlocate = document.querySelector("#GetLocate");

    L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
        attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
    }).addTo(map);

    //目的地にピンを建てる

    for (let i = 0; i < Object.keys(dest).length; i++) {
        DestLat = dest[i]["latitude"];
        DestLon = dest[i]["longitude"];
        if (Object.keys(dest).length == 1) {
            map.setView([DestLat, DestLon], 10);
        } else {
            map.setView([37.985358, 135.753331], 5);
        }

        if(dest[i]["locationName"] == "登録待ち") {
            continue;
        }

        markers[i] = L.marker([DestLat, DestLon]).addTo(map).on('click', function (e) { clickEvent(e); });
        markers[i].bindPopup(L.popup({
            autoClose: false
        }).setContent(dest[i]["locationName"])).openPopup();
        markers[i].id = dest[i]["locationID"];
        markers[i].name = dest[i]["locationName"];
        markers[i].latitude = DestLat;
        markers[i].longitude = DestLon;
        markers[i].number = i;
    }

    //クリックイベントで発火する関数
    function clickEvent(e) {
        window.location = "/search/" + e.target.id;
        alert(e.target.name + "が選択されました");


        DestLat = e.target.latitude;
        DestLon = e.target.longitude;

        let currentMarkers = [];

        for (let i = 0; i < markers.length; i++) {
            map.removeLayer(markers[i]);
            if (e.target.number == i) {
                currentMarkers = markers[i]
            }

        }
        let marker = L.marker([currentMarkers.latitude, currentMarkers.longitude]).addTo(map);
        marker.bindPopup(currentMarkers.name).openPopup();


    }

    if (markers.length == 1) {
        fetch('https://api.openweathermap.org/data/2.5/onecall?lat=' + DestLat + '&lon=' + DestLon + '&lang=ja&APPID=39e545646eebdf1e60bcc141aa8fa102')
            .then(function (response) {
                return response.json();
            }).then(function (json) {
                jsonArray = JSON.stringify(json);
                data = JSON.parse(jsonArray);

                for (var i = 0; i <= 6; i++) {

                    var weat = data['daily'][i]['weather'][0]['main'];  //その日の天気の取得
                    var icon = data['daily'][i]['weather'][0]['icon'];  //天気画像の取得
                    var utc = data['daily'][i]['dt'];   //日付の取得(UTC方式)

                    // UTC時間を日本時間に変換 
                    var date = new Date(utc * 1000);
                    var month = date.getMonth() + 1;
                    var day = date.getDate();


                    // HTMLでの表示 
                    weatherHTML.innerHTML += '<div class="day">' + month + '月' + day + '日<br>' +
                        weat + '<br>' +
                        "<img src='http://openweathermap.org/img/wn/" + icon + "@2x.png'></img></div>";

                }
            })
    }

    //ナビ開始
    NaviStart.onclick = () => {
        L.Routing.control({
            waypoints: [
                L.latLng(MeLocationLat, MeLocationLon),
                L.latLng(DestLat, DestLon)
            ],
            routeWhileDragging: true
        }).addTo(map);
        map.setView([(DestLat + MeLocationLat) / 2, (DestLon + MeLocationLon) / 2], 6);
    }

    //現在地の取得
    getlocate.onclick = () => {
        map.on("locationerror", onLocationError);
        map.on("locationfound", onLocationFound);
        map.locate({
            setView: "true"
        });
    }

    function onLocationError(e) {
        alert(e.message);
    }

    function onLocationFound(e) {
        LocateMarker = L.marker(e.latlng).addTo(map);
        MeLocationLat = Number(e.latlng.lat);
        MeLocationLon = Number(e.latlng.lng);
    }




}

onload = mapon;