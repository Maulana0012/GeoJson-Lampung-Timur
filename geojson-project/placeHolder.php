<script>
    var mapLayerCheckBox = document.getElementById("map-layer");
    mapLayerCheckBox.addEventListener("change",
        () => {
            if (mapLayerCheckBox.checked) {
                map.removeLayer(jsonTest);
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

    var markerCheckBox = document.getElementById("hide-marker");
    markerCheckBox.addEventListener("change", () => {
        if (markerCheckBox.checked) {
            map.removeLayer(marker);
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
                    .bindPopup("Kode kode_kecamatan:" + kode_kecamatan + "<br>" +
                        keterangan + "<br>" + tanggal); // PUSKESMAS AMUNTAI SELATAN

                <?php
            }
            ?>

        }
    });
</script>