<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
    <link rel="stylesheet" href="../css/L.Control.Sidebar.css" />
    <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../vendors/font-awesome/css/font-awesome.min.css">

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@2.0.0/css/boxicons.min.css'>
<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>

<script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.css">
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js"></script>
<script src="http://leaflet.github.io/Leaflet.markercluster/dist/leaflet.markercluster-src.js"></script>
	<script src="http://leaflet.github.io/Leaflet.markercluster/example/realworld.388.js"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link id="style1" rel="stylesheet" href="../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link href="../../assets/img/favicon.ico" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="shortcut icon" href="../../assets/img/apple-touch-icon.png" />
    <title></title>
  </head>
  <body>
    <div id="map-wrapper">
       <div id="map"></div>
       <div id="button-wrapper">
         <button type="button" class="btn btn-primary btn-sm" onclick="location.reload(); return false;" name="button">Refresh <i class="fa fa-restore"></i></button>
         <button type="button" class="btn btn-primary btn-sm" onclick="location.reload(); return false;" name="button">View list <i class="fa fa-receipt"></i> </button>
        </div>
   </div>
    <div id="sidebar">
        <div id="lc"></div>
    </div>

<script src="../js/L.Control.Sidebar.js"></script>
<style media="screen">
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
    <script>
    $( document ).ready(function() {
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
  var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 13);
  var lat = position.coords.latitude;
  var lng = position.coords.longitude;
  var markers = L.markerClusterGroup();
  var markerArray = [];

  cords = lat+","+lng;
    var greenIcon = new L.Icon({
      iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-blue.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [25, 41],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });
    var redIcon = new L.Icon({
      iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [25, 41],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });
  $.ajax({
   url: "../fetch_drives.php",
   type: "POST",
   data: {lat:lat,lng:lng},
   success: function(data)
   {
       data = JSON.parse(JSON.stringify(data));
       console.log(data);
       for (var i = 0; i < data.length; i++) {
         loc = "<p><b>"+data[i]["name"]+"</b></p>";
         loc +="<hr>";
         loc +=" <p>Type: "+data[i]["type"]+"</p>";
         loc +="<p>Address: "+data[i]["address"]+"</p>";
         loc +=" <p>Contact: "+data[i]["contact"]+"</p>";
         loc += "<p><button class='btn btn-primary btn-sm' onclick=\"window.location.href='navigation?fdst="+data[i]['name']+"&lat="+lat+"&lng="+lng+"&dlat="+data[i]['lat']+"&dlng="+data[i]['lng']+"'\">Directions &nbsp<i class='fa fa-map-o'></i></button> &nbsp";
         loc += "<button class='btn btn-info btn-sm'>Book Appointment &nbsp<i class='fa fa-calendar'></i></button></p>";
         marker = new L.marker([data[i]["lat"], data[i]["lng"]],{icon: redIcon})
         .bindPopup(loc).addTo(map);
         /*marker = new L.marker([data[i]["lat"], data[i]["lng"]],{icon: redIcon})
         .bindPopup(loc).addTo(map).on('click', function (e) {
           //map.panTo(e.latlng, 13);
          // sidebar.toggle();
           //document.getElementById('lc'+i).innerHTML = "<span id='lc'><h2>"+loc+"</h2></span>";
           //sidebar.setContent('<h3>Your current location</h3>');
           //sidebar.setContent(htm);
         });*/

          markers.addLayer(marker);
    			markerArray.push(marker);
          if(i==data.length-1){
              var group = L.featureGroup(markerArray);
              map.fitBounds(group.getBounds());
          }

       }
        //map.addLayer(markers);
    		var group = new L.featureGroup(markers);
    		map.fitBounds(group.getBounds());
   }
 });
  L.tileLayer(
  'https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZmFyYWRheTIiLCJhIjoiTUVHbDl5OCJ9.buFaqIdaIM3iXr1BOYKpsQ', {
    attribution: '© <a href="./">iDonate</a> © <a href="https://www.mapbox.com/feedback/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    maxZoom: 25,
  }).addTo(map);

  //alert(htm);

  L.marker([position.coords.latitude, position.coords.longitude], {icon: greenIcon}).bindPopup("Your Location").addTo(map);


  var sidebar = L.control.sidebar('sidebar', {
      closeButton: true,
      position: 'left'
  });
  map.addControl(sidebar);

  map.on('click', function () {
      sidebar.hide();
  })
  map.addControl(new L.Control.Fullscreen());
  var lc = L.control.locate().addTo(map);

  }
  getLocation();
  });
</script>
  </body>
</html>
