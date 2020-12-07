const topmap = () => {
    var top_map = null;
    let markers = [];
    let DestLat;
    let DestLon;

    top_map = L.map('mapid').setView([36.985358, 135.753331], 6);

    L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
        attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
    }).addTo(top_map);

    //マーカーを追加する。
    //var marker = L.marker([34.985358, 135.753331]).addTo(top_map);
    //上のマーカーにポップアップを追加する。
    //marker.bindPopup("ｋｃｇ").openPopup();

    for(let i = 0; i < Object.keys(tr).length; i++) {
        if(tr[i]["locationName"] == "登録待ち") {
            continue;
        }
        DestLat = tr[i]["latitude"];
        DestLon = tr[i]["longitude"];
        markers[i] = L.marker([DestLat, DestLon]).addTo(top_map).on('click',function(e) { clickEvent(e); } );
        markers[i].bindPopup(L.popup({
            //closeOnClick: true,
            autoClose: false
        }).setContent(tr[i]["locationName"])).openPopup();
        markers[i].id = tr[i]["locationID"];
        markers[i].name = tr[i]["locationName"];
        markers[i].latitude = DestLat;
        markers[i].longitude = DestLon;
        markers[i].number = i;
    }

   //window.location = "/search"
   function clickEvent(e){
    //alert( e.target.latitude + ": "+ e.target.longitude);
    /*
    DestLat = e.target.latitude;
    DestLon = e.target.longitude;
    console.log("number:"+e.target.number);
    console.log(markers);

    let currentMarkers = [];

    for(let i = 0; i < markers.length; i++) {
        top_map.removeLayer(markers[i]);
        if(e.target.number == i) {
            currentMarkers = markers[i]
        }
    }
    let marker = L.marker([currentMarkers.latitude, currentMarkers.longitude]).addTo(top_map);
    marker.bindPopup(currentMarkers.name).openPopup();
    */
    //map.removeLayer(markers[e.target.number]);
    //marker = L.marker([DestLat, DestLon]).addTo(map);
    //marker.bindPopup(e.target.name).openPopup();
    //map.panTo(e.latlng);
    window.location = "/search/"+e.target.id;
    }  
   
}
onload = topmap