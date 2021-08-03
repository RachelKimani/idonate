<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.css"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.2.0/leaflet.js"></script>

    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
    <link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' />
    <!-- Leaflet Map -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        html, body, #map {
            height: 100%;
            width: 100%;
        }
    </style>
  </head>
  <body>

    <script type="text/javascript">

    var request = new XMLHttpRequest();

    request.open('GET', 'https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf624892b5e1c8c9ec4e9586927c8669bc485c&start=8.681495,49.41461&end=8.687872,49.420318&format=geojson');

    request.setRequestHeader('Accept', 'application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8');

    request.onreadystatechange = function () {
    if (this.readyState === 4) {
      console.log('Status:', this.status);
      console.log('Headers:', this.getAllResponseHeaders());
      console.log('Body:', this.responseText);
      //document.getElementById('response').innerHTML = this.responseText;

      $.ajax({
                    url: 'response.php',
                    type: 'post',
                    data: {res:this.responseText},
                    dataType: 'JSON',
                    success: function(data){
                      L.mapbox.accessToken = 'pk.eyJ1IjoiZmFyYWRheTIiLCJhIjoiTUVHbDl5OCJ9.buFaqIdaIM3iXr1BOYKpsQ';
                      //document.getElementById('response').innerHTML =data.features.properties.segments.steps.toString();
                      var mapboxTiles = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=' + L.mapbox.accessToken, {
                             attribution: '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                             tileSize: 512,
                             zoomOffset: -1
                      });

                      var map = L.map('map')
                        .addLayer(mapboxTiles)
                        .setView([42.3610, -71.0587], 15);
                     //var markers = L.geoJSON(data).addTo(map);
                     L.Routing.control(data).addTo(map);
                    }
                });
    }
    };

    request.send();
    </script>

        <div id="map"></div>
        <script>

        </script>
    <div class="">
      <pre>
        <div id="response">

        </div>
      </pre>
    </div>

  </body>
</html>
