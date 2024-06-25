<?php

if (isset($_POST['Submit'])) {
    $kode_kecamatan = $_POST['kode_kecamatan'];
    $nama_kecamatan = $_POST['nama_kecamatan'];
    $geojson_file_name = $_FILES['geojson_file']['name'];
    // file upload to folder upload
    $tmpFileName = $_FILES['geojson_file']['tmp_name'];
    $fileType = $_FILES['geojson_file']['type'];

    $fileExt = explode('.', $geojson_file_name);
    $to_lower_file = strtolower(end($fileExt));
    $allowed = array('geojson');

    if (in_array($to_lower_file, $allowed)) {
        // $newFileName = uniqid('', true) . "." . $to_lower_file;
        move_uploaded_file($tmpFileName, '../upload/' . $geojson_file_name);
    } else {
        echo "only geojson file";
    }

    $result = mysqli_query($conn, "INSERT INTO kecamatan(kode_kecamatan, nama_kecamatan, geojson_file_name)
VALUES('$kode_kecamatan','$nama_kecamatan','$geojson_file_name')");
    header("Location:?page=kecamatan-show");
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Kecamatan</strong>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=kecamatan-add" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="kode_kecamatan" class="control-label">Kode Kecamatan</label>
                        <input type="text" class="form-control" name="kode_kecamatan"
                            placeholder="Masukan Kode kecamatan..." required>
                    </div>
                    <div class="form-group">
                        <label for="nama_kecamatan" class="control-label">Nama kecamatan</label>
                        <input type="text" class="form-control" name="nama_kecamatan"
                            placeholder="Masukan Nama kecamatan..." required>
                    </div>
                    <div class="form-group">
                        <label for="geojson_file_name" class="control-label">FIle Geojson</label>
                        <input type="file" class="form-control" name="geojson_file" id="geojson_file" required>
                    </div>
                    <input type="submit" name="Submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" name="reset" class="btn btn-danger" value="Reset">
                </form>
            </div>
        </div>
    </div>
</div>