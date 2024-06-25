<html>

<head>
    <title> WebGIS GeoJSON Kabupaten Balangan </title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="shortcut icon" href="assets/image/BalanganLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="index-css.css">
    <script src="function.js"></script>



    <style type="text/css">
    #map {
        height: 600px;
    }
    </style>
</head>

<body>
    <div id="map">
        <div id="map">
            <!--  pop up -->
            <div id="side-nav-bar">
                <p style="font-size:30px;cursor:pointer" id="side-nav-span" onclick="openNav()">&#9776; open</p>
                <div id="mySidenav" class="sidenav">
                    <p id="text-nav-menu">NAV MENU</p>
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <p id="text-p">Change View</p>
                    <!--  -->
                    <div id="switch-div">
                        <label class="switch">
                            <input type="checkbox" id="switch-mapview" />
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <p id="text-p"><br>Hide Marker</p>
                    <div id="switch-div">
                        <label class="switch">
                            <input type="checkbox" id="hide-marker" />
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <p id="text-p"><br>Hide Map Layer</p>
                    <div id="switch-div">
                        <label class="switch">
                            <input type="checkbox" id="map-layer" />
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <b> Copyright &copy; 2024 WebGIS GeoJSON Kabupaten Balangan <br> Kelompok 1 </b>

</body>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="../assets/js/leaflet.ajax.js"></script>
<script src="../assets/js/leaflet-panel-layers/src/leaflet-panel-layers.js"></script>
<script src="../assets/js/leaflet.ajax.js"></script>
<script src="../assets/js/leaflet-easyPrint-gh-pages/dist/bundle.js"></script>

<script type="text/javascript">
var map = L.map("map").setView([-2.454064, 115.141868], 11);

var jsonTest = new L.GeoJSON.AJAX(["../assets/geojson/63.08HuluSungaiUtara-Amuntai.geojson"], {
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
    var popup = L.popup();
    popup
        .setLatLng(e.latlng)
        .setContent(
            "lat:" +
            e.latlng.lat.toString() +
            "<br>lng:" +
            e.latlng.lng.toString()
        )
        .openOn(map);
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("side-nav-span").style.display = "none";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("side-nav-span").style.display = "block";
}
map.on("click", onMapClick);
</script>

</html>