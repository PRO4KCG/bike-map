

const weather = () => {
    
    console.log("weather.js");
    //OpenWeatherMap天気予報API
    //var owm_key = "39e545646eebdf1e60bcc141aa8fa102";
    var weatherHTML = document.querySelector(".weather");
    fetch('http://api.openweathermap.org/data/2.5/onecall?lat=34.985358&lon=135.753331&lang=ja&APPID=39e545646eebdf1e60bcc141aa8fa102')
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

            /* UTC時間を日本時間に変換 */
            var date = new Date( utc * 1000 );
            var month = date.getMonth() + 1;
            var day = date.getDate();

            /* HTMLでの表示 */
            weatherHTML.innerHTML += '<div class="day">' + month + '月' + day + '日<br>'+
                                     weat +'<br>'+
                                     "<img src='http://openweathermap.org/img/wn/"+icon+"@2x.png'></img></div>";

        }
    })
}
onload = weather;