<html>

<head>
  <title> WebGIS GeoJSON Kabupaten Balangan </title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <link rel="shortcut icon" href="assets/image/BalanganLogo.png" type="image/x-icon">



  <style type="text/css">
    #map {
      height: 600px;
    }
  </style>
</head>

<body>
  <center>
    <font color='#000000'>
      <h2><b> WebGIS GeoJSON Kabupaten Balangan </b></h2>
    </font>
    <img src='assets/image/BalanganLambang.png'>
  </center> <br>

  <div id="map"></div>

  <center> <br>
    <b> Copyright &copy; 2024 WebGIS GeoJSON Kabupaten Balangan <br> FY Rahman </b>
  </center>

</body>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
  integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="assets/js/leaflet.ajax.js"> </script>
<script src="assets/js/leaflet-panel-layers/src/leaflet-panel-layers.js"></script>
<script src="assets/js/leaflet.ajax.js"></script>
<script src="assets/js/leaflet-easyPrint-gh-pages/dist/bundle.js"></script>

<script type="text/javascript">
  var map = L.map('map').setView([-4.681367, 104.749146], 7);

  var jsonTest = new L.GeoJSON.AJAX(["assets/geojson/kabupaten-lampung.geojson"], {
    onEachFeature: popUp
  }).addTo(map);

  // <!--Tampilan Maps OpenStreetMap-- >
  //		L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  //		maxZoom: 15,
  //		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  //		}).addTo(map);

  // <!--Tampilan Maps Tampilan Satellite-- >
  // L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}?access_token={accessToken}', {
  // 	maxZoom: 15,
  // 	id: 'mapbox.streets',
  // 	accessToken: 'pk.eyJ1IjoiZmF1eml5dXNhcmFobWFuIiwiYSI6ImNsZmpiOXBqYTJnbzUzcnBnNnJzMjB0ZHMifQ.AldZlBJVQaCALzRw-vhWiQ'
  // }).addTo(map);

  // <!--Tampilan Maps Tampilan Hybrid-- >
  L.tileLayer('http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}?access_token={accessToken}', {
    maxZoom: 15,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZmF1eml5dXNhcmFobWFuIiwiYSI6ImNsZmpiOXBqYTJnbzUzcnBnNnJzMjB0ZHMifQ.AldZlBJVQaCALzRw-vhWiQ'
  }).addTo(map);

  // 
  L.easyPrint({
    title: 'Cetak Peta Kabupaten',
    position: 'topleft',
    sizeModes: ['A4Portrait', 'A4Landscape']
  }).addTo(map);

  function popUp(f, l) {
    var out = [];
    if (f.properties) {
      for (key in f.properties) {
        out.push(key + ": " + f.properties[key]);
      }
      l.bindPopup(out.join("<br />"));
    }
  }

  function onMapClick(e) {
    var num = 0;
    tempString = e.latlng.toString();
    tempString = tempString.replace('LatLng(', '');
    tempString = tempString.replace(')', '');

    var marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map).on('click', e => e.target.remove());
  }

  map.on('click', onMapClick);
</script>
<p>
  <hr>
<h4>
  i clicked at:
  <span id="myLocation"></span>
  <br>
</h4>
</p>

</html>