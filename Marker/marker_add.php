<?php

if (isset($_POST['Submit'])) {
    $kode_kecamatan = $_POST['kode_kecamatan'];
    $keterangan = $_POST['keterangan'];
    $lat = $_POST['lat_pos'];
    $lng = $_POST['lng_pos'];


    $result = mysqli_query($conn, "INSERT INTO marker(kode_kecamatan, keterangan, lat_pos, lng_pos, tanggal)
VALUES('$kode_kecamatan','$keterangan','$lat','$lng','" . date("Y-m-d h:i:sa") . "')");
    header("Location:?page=marker-show");
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Marker</strong>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=marker-add" class="form-horizontal" enctype="multipart/form-data"
                    action="file_handler.php">
                    <div class="form-group">
                        <label for="kode_kecamatan" class="control-label">Kode Kecamatan</label>
                        <input type="text" class="form-control" name="kode_kecamatan"
                            placeholder="Masukan Kode kecamatan..." required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="control-label">keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="keterangan..." required>
                    </div>
                    <div class="form-group">
                        <label for="lat_pos" class="control-label">Latitude Position</label>
                        <input type="number" step="0.0000000000000001" class="form-control" name="lat_pos"
                            placeholder="Latitude Position..." required>
                    </div>
                    <div class="form-group">
                        <label for="lng_pos" class="control-label">Longitude Position</label>
                        <input type="number" step="0.0000000000000001" class="form-control" name="lng_pos"
                            placeholder="Longitude Position..." required>
                    </div>
                    <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" name="reset" class="btn btn-danger" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>