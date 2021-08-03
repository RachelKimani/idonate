<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Plain Leaflet API</title>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' />
<!-- Leaflet Map -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
<!-- end Leaflet map -->
<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:100%; }
</style>
</head>
<body>
<div id='map'></div>

<script>
L.mapbox.accessToken = 'pk.eyJ1IjoiZmFyYWRheTIiLCJhIjoiTUVHbDl5OCJ9.buFaqIdaIM3iXr1BOYKpsQ';

var mapboxTiles = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=' + L.mapbox.accessToken, {
       attribution: '© <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
       tileSize: 512,
       zoomOffset: -1
});

var map = L.map('map')
  .addLayer(mapboxTiles)
  .setView([-1.3039628075536773, 36.80745114534944], 15);
 L.Routing.control({
                router: L.Routing.mapbox(L.mapbox.accessToken,{
                    profile : 'mapbox/driving',
                    language: 'en',
                }),
                waypoints: [
                    L.latLng(-1.3039628075536773, 36.80745114534944),
                    L.latLng(-0.091702,34.767956)
                ],
            }).addTo(map);
</script>
</body>
</html>
