<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <link rel="stylesheet" href="../../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../../vendors/font-awesome/css/font-awesome.min.css">
    <script>
      function getParameterByName(name, url = window.location.href) {
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
      }
    </script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link id="style1" rel="stylesheet" href="../../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link href="../../../assets/img/favicon.ico" rel="icon">
    <link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="shortcut icon" href="../../../assets/img/apple-touch-icon.png" />
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' />
<link href='../../css/leaflet-compass.css' rel='stylesheet' />
<!-- Leaflet Map -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>

<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.css">
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js"></script>
<script src="../../js/leaflet-compass.js"></script>



<!-- end Leaflet map -->
<style>
  body { margin:0; padding:0; }
  #map { position:absolute; top:0; bottom:0; width:100%; }
  #map {
  width: 100%;
  height: 100vh;
  }
  #map-wrapper {
    width: 100%;
    position: relative;
    height: 100vh;
}
#button-wrapper {
    position: absolute;
    bottom: 10px;
    width: 100%;
    z-index: 1000;
}
</style>
</head>
<body>
  <div id="map-wrapper">
     <div id="map"></div>
     <div id="button-wrapper">
       <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='../navm.php'; return false;" name="button">Back</button>
       <button type="button" class="btn btn-primary btn-sm" onclick="location.reload(); return false;" name="button">Refresh</button>
      </div>
  </div><script>
$( document ).ready(function() {
    L.mapbox.accessToken = 'pk.eyJ1IjoiZmFyYWRheTIiLCJhIjoiTUVHbDl5OCJ9.buFaqIdaIM3iXr1BOYKpsQ';

    var mapboxTiles = L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=' + L.mapbox.accessToken, {
           attribution: '© <a href="./">iDonate</a> © <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
           tileSize: 512,
           zoomOffset: -1,
           position:'bottomright'
    });
    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            showPosition,
            null,
            {
               enableHighAccuracy: true,
               timeout: 5000,
               maximumAge: 0
            });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
    }

    function showPosition(position) {
    var lata = position.coords.latitude;
    var lnga = position.coords.longitude;
    var southWest = L.latLng(getParameterByName('dlat'), getParameterByName('dlng')),
    northEast = L.latLng(lata, lnga),
    mybounds = L.latLngBounds(southWest, northEast);
    var map = L.map('map').setView([lata,getParameterByName('dlng')], 13);
      map.addControl( new L.Control.Compass({autoActive: true, showDigit:true,position:'topright'}) );
      map.addLayer(mapboxTiles);
     var control  = L.Routing.control({
                    router: L.Routing.mapbox(L.mapbox.accessToken,{
                        profile : 'mapbox/driving',
                        language: 'en',
                    }),
                    maxBounds: mybounds,
                    waypoints: [
                        L.latLng([lata,lnga]),
                        L.latLng([getParameterByName('dlat'),getParameterByName('dlng')])
                    ],
                      lineOptions: {
                      styles:
                              [
                                  {color: 'black', opacity: 0.15, weight: 9}, //sombra
                                  {color: 'white', opacity: 0.8, weight: 6}, // Contorno
                                  {color: 'red', opacity: 0.8, weight: 2}] // Centro
                     },
                     routeWhileDragging: true,
                     show: true,
                     summaryTemplate:  '<b><p>Route:</b> {name}</p><h4><b>Destination:&nbsp</b>'+getParameterByName('fdst')+'</h4><p><b>Distance:</b> {distance}&nbsp<b>Time:</b> {time}</p>'
                    }).addTo(map);
                  map.addControl(new L.Control.Fullscreen());
                L.easyButton( 'fa-user', function(){
                  control.getRouter().options.profile = 'mapbox/walking';
                  control.route();
                }).addTo(map);
                L.easyButton( 'fa-car', function(){
                  control.getRouter().options.profile = 'mapbox/driving';
                  control.route();
                }).addTo(map);
                var lc = L.control.locate().addTo(map);
                lc.start();
                map.fitBounds(mybounds, true);
                //alert(lc.latlng);





              var current_position, current_accuracy;
              var ltln='';
               function onLocationFound(e) {
                 if(ltln!=''){
                   if(ltln.equals(e.latlng)){
                     console.log("Not changed");
                   } else {

                     ltln=e.latlng
                     // if position defined, then remove the existing position marker and accuracy circle from the map
                     if (current_position) {
                         map.removeLayer(current_position);
                         map.removeLayer(current_accuracy);
                     }

                     var radius = e.accuracy / 1;

                     current_position = L.marker(e.latlng).addTo(map)
                       .bindPopup("You are within " + radius + " meters from this point").openPopup();

                     current_accuracy = L.circle(e.latlng).addTo(map);
                     control.spliceWaypoints(0, 1, e.latlng);
                     control.route();
                   }
                 }else {

                   ltln=e.latlng
                   // if position defined, then remove the existing position marker and accuracy circle from the map
                   if (current_position) {
                       map.removeLayer(current_position);
                       map.removeLayer(current_accuracy);
                   }

                   var radius = e.accuracy / 1;

                   current_position = L.marker(e.latlng).addTo(map)
                     .bindPopup("You are within " + radius + " meters from this point").openPopup();

                   current_accuracy = L.circle(e.latlng).addTo(map);
                   control.spliceWaypoints(0, 1, e.latlng);
                 }

               }

               function onLocationError(e) {
                 //alert(e.message);
               }

               map.on('locationfound', onLocationFound);
               map.on('locationerror', onLocationError);

               // wrap map.locate in a function
               function locate() {
                 map.locate();
               }
               locate();
               // call locate every 3 seconds... forever
               //setInterval(locate, 3000);



               var id, target, options;

                function success(pos) {
                  var crd = pos.coords;
                  dests = L.latLng([target.latitude,target.longitude]);
                  crf = L.latLng([crd.latitude,crd.longitude]);
                  locate();
                  if (crf.equals(dests)) {
                    swal({
                      title: 'Success!',
                      text: 'You have reached your destination',
                      icon: 'success',
                      button: {
                        text: "Continue",
                        value: true,
                        visible: true,
                        className: "btn btn-primary"
                      }
                    })
                    //alert('You have reached your destination');
                    navigator.geolocation.clearWatch(id);
                  }
                }

                function error(err) {
                  console.warn('ERROR(' + err.code + '): ' + err.message);
                }

                target = {
                  latitude : getParameterByName('dlat'),
                  longitude: getParameterByName('dlng')
                };

                options = {
                  enableHighAccuracy: false,
                  timeout: 5000,
                  maximumAge: 0
                };

                id = navigator.geolocation.watchPosition(success, error, options);
                //control._container.style.display = "None";
              }
              getLocation();
              });

</script>

    <script src="../../../../register/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../../../../register/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="../../../../register/vendor/jquery-steps/jquery.steps.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="../../../vendors/jquery-toast-plugin/jquery.toast.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- Custom js for this page-->
    <script src="../../../js/toastDemo.js"></script>
    <script src="../../../js/desktop-notification.js"></script>

  <script src="../../../vendors/sweetalert/sweetalert.min.js"></script>
</body>
</html>
