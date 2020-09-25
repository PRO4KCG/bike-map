const topmap = () => {
    var top_map = null;

    top_map = L.map('mapid').setView([34.985358, 135.753331], 15);

    L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
        attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
    }).addTo(top_map);

    //マーカーを追加する。
    var marker = L.marker([34.985358, 135.753331]).addTo(top_map);
    //上のマーカーにポップアップを追加する。
    marker.bindPopup("ｋｃｇ").openPopup();
    
}
onload = topmap