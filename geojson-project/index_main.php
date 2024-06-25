<!-- accesing Leaflet css -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
<link rel="shortcut icon" href="assets/image/BalanganLogo.png" type="image/x-icon">
<link rel="stylesheet" href="index-css.css">
<script src="function.js"></script>
<div>
    <!-- Top text -->
    <center>
        <font color="#000000">
            <h2><b> WebGIS GeoJSON LAMPUNG Hulu Sungai Utara </b></h2>
            <img style="width: 5%;" src="../img/Logo WebGis.png/" alt="Lampung Hulu Sungai Utara">
        </font>
    </center>

    <!-- switch button -->
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
    <!-- this is where you access leaflet feature/assets by including with script -->
    <!-- code goes here -->
    <script type="text/javascript">
    // a set of variable
    var marker;
    var jsonTest;
    var hybirdiew;
    var sateliteVIew;

    // map view placeholder
    hybirdiew = L.tileLayer(
        "http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}?access_token={accessToken}", {
            maxZoom: 15,
            id: "mapbox.streets",
            accessToken: "pk.eyJ1IjoiZmF1eml5dXNhcmFobWFuIiwiYSI6ImNsZmpiOXBqYTJnbzUzcnBnNnJzMjB0ZHMifQ.AldZlBJVQaCALzRw-vhWiQ",
        });
    // sateliteVIew
    sateliteVIew = L.tileLayer(
        "https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}?access_token={accessToken}", {
            maxZoom: 15,
            id: "mapbox.streets",
            accessToken: "pk.eyJ1IjoiZmF1eml5dXNhcmFobWFuIiwiYSI6ImNsZmpiOXBqYTJnbzUzcnBnNnJzMjB0ZHMifQ.AldZlBJVQaCALzRw-vhWiQ",
        });

    // Map View Configuration
    var map = L.map("map").setView([-2.454064, 115.141868], 11);

    // adding view map
    map.addLayer(sateliteVIew);

    // on click map event
    map.on("click", onMapClick);

    // Marker
    <?php
        $selectFromDatabase = mysqli_query($conn, "SELECT kode_kecamatan, keterangan, lat_pos, lng_pos, tanggal FROM marker") or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($selectFromDatabase)) { ?>
    var kode_kecamatan = "<?= $row['kode_kecamatan'] ?>";
    var keterangan = "<?= $row['keterangan'] ?>";
    var lat_pos = "<?= $row['lat_pos'] ?>";
    var lng_pos = "<?= $row['lng_pos'] ?>";
    var tanggal = "<?= $row['tanggal'] ?>";


    marker = L.marker([lat_pos, lng_pos])
        .addTo(map)
        .bindPopup("Kode : " + kode_kecamatan + "<br>" + "Keterangan : " + keterangan + "<br>" + tanggal)
        .openPopup(); // PUSKESMAS AMUNTAI SELATAN

    <?php
        }
        ?>

    // Geojson Assets
    // loop for upload
    <?php
        $selectFromDatabase = mysqli_query($conn, "SELECT kode_kecamatan, nama_kecamatan, geojson_file_name FROM kecamatan") or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($selectFromDatabase)) { ?>
    var kode_kecamatan = "<?= $row['kode_kecamatan'] ?>";
    var nama_kecamatan = "<?= $row['nama_kecamatan'] ?>";
    var geojson_file_name = "<?= $row['geojson_file_name'] ?>";

    jsonTest = new L.GeoJSON.AJAX(["../upload/" + geojson_file_name], {
            onEachFeature: popUp,
        }).addTo(map).bindPopup("Kode kecamatan:" + kode_kecamatan + "<br>Nama kecamatan:" +
            nama_kecamatan)
        .openPopup();
    <?php
        }
        ?>

    // Map OpenStreetView View
    //		L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //		maxZoom: 15,
    //		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    //		}).addTo(map);

    // event listener
    var mapViewCheckBox = document.getElementById("switch-mapview");
    mapViewCheckBox.addEventListener("change", () => {
        if (mapViewCheckBox.checked) {
            map.removeLayer(sateliteVIew);
            map.addLayer(hybirdiew);
        } else {
            map.removeLayer(hybirdiew);
            map.addLayer(sateliteVIew);
        }
    });

    var markerCheckBox = document.getElementById("hide-marker");
    markerCheckBox.addEventListener("change", () => {
        if (markerCheckBox.checked) {
            map.eachLayer(function(layer) {
                map.removeLayer(layer);
            });
            if (mapViewCheckBox.checked) {
                map.removeLayer(sateliteVIew);
                map.addLayer(hybirdiew);
            } else {
                map.removeLayer(hybirdiew);
                map.addLayer(sateliteVIew);
            }
            <?php
                $selectFromDatabase = mysqli_query($conn, "SELECT kode_kecamatan, nama_kecamatan, geojson_file_name FROM kecamatan") or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($selectFromDatabase)) { ?>
            var kode_kecamatan = "<?= $row['kode_kecamatan'] ?>";
            var nama_kecamatan = "<?= $row['nama_kecamatan'] ?>";
            var geojson_file_name = "<?= $row['geojson_file_name'] ?>";

            jsonTest = new L.GeoJSON.AJAX(["../upload/" + geojson_file_name], {
                onEachFeature: popUp,
            }).addTo(map).bindPopup("Kode kecamatan:" + kode_kecamatan + "<br>Nama kecamatan:" +
                nama_kecamatan);
            <?php
                }
                ?>
        } else {
            <?php
                $selectFromDatabase = mysqli_query($conn, "SELECT kode_kecamatan, keterangan, lat_pos, lng_pos, tanggal FROM marker") or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($selectFromDatabase)) { ?>
            var kode_kecamatan = "<?= $row['kode_kecamatan'] ?>";
            var keterangan = "<?= $row['keterangan'] ?>";
            var lat_pos = "<?= $row['lat_pos'] ?>";
            var lng_pos = "<?= $row['lng_pos'] ?>";
            var tanggal = "<?= $row['tanggal'] ?>";


            marker = L.marker([lat_pos, lng_pos])
                .addTo(map)
                .bindPopup("Kode:" + kode_kecamatan + "<br>" + "Keterangan: " + keterangan + "<br>" +
                    tanggal); // PUSKESMAS AMUNTAI SELATAN

            <?php } ?>

        }
    });

    // map.removeLayer(jsonTest);
    var mapLayerCheckBox = document.getElementById("map-layer");
    mapLayerCheckBox.addEventListener("change",
        () => {
            if (mapLayerCheckBox.checked) {
                map.eachLayer(function(layer) {
                    map.removeLayer(layer);
                });
                if (mapViewCheckBox.checked) {
                    map.removeLayer(sateliteVIew);
                    map.addLayer(hybirdiew);
                } else {
                    map.removeLayer(hybirdiew);
                    map.addLayer(sateliteVIew);
                }
                <?php
                    $selectFromDatabase = mysqli_query($conn, "SELECT kode_kecamatan, keterangan, lat_pos, lng_pos, tanggal FROM marker") or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_array($selectFromDatabase)) { ?>
                var kode_kecamatan = "<?= $row['kode_kecamatan'] ?>";
                var keterangan = "<?= $row['keterangan'] ?>";
                var lat_pos = "<?= $row['lat_pos'] ?>";
                var lng_pos = "<?= $row['lng_pos'] ?>";
                var tanggal = "<?= $row['tanggal'] ?>";

                marker = L.marker([lat_pos, lng_pos])
                    .addTo(map)
                    .bindPopup("Kode kode_kecamatan:" + kode_kecamatan + "<br>" + keterangan + "<br>" + tanggal)
                    .openPopup(); // PUSKESMAS AMUNTAI SELATAN

                <?php } ?>
            } else {
                <?php
                    $selectFromDatabase = mysqli_query($conn, "SELECT kode_kecamatan, nama_kecamatan, geojson_file_name FROM kecamatan") or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_array($selectFromDatabase)) { ?>
                var kode_kecamatan = "<?= $row['kode_kecamatan'] ?>";
                var nama_kecamatan = "<?= $row['nama_kecamatan'] ?>";
                var geojson_file_name = "<?= $row['geojson_file_name'] ?>";

                jsonTest = new L.GeoJSON.AJAX(["../upload/" + geojson_file_name], {
                    onEachFeature: popUp,
                }).addTo(map).bindPopup("Kode kecamatan:" + kode_kecamatan + "<br>Nama kecamatan:" +
                    nama_kecamatan);
                <?php
                    }
                    ?>
            }
        });



    // <!--Tampilan Maps Tampilan Hybrid-- >

    L.easyPrint({
        title: "Cetak Peta kecamatan",
        position: "topleft",
        sizeModes: ["A4Portrait", "A4Landscape"],
    }).addTo(map);


    // iterate over Geojson file
    function popUp(f, l) {
        var out = [];
        if (f.properties) {
            for (key in f.properties) {
                out.push(key + ": " + f.properties[key]);
            }
            l.bindPopup(out.join("<br />"));
        }
    }

    // show on click latlng
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

    // nav function
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("side-nav-span").style.display = "none";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("side-nav-span").style.display = "block";
    }
    </script>
</div>