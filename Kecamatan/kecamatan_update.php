<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $old_file_name;

    $iterateOldName = $conn->query("SELECT geojson_file_name FROM kecamatan where id = $id");

    if ($iterateOldName->num_rows > 0) {
        // output data of each row
        while ($row = $iterateOldName->fetch_assoc()) {
            unlink('../upload/' . $row['geojson_file_name']);
        }
    }

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

    // update user data
    $kode_kecamatan = $_POST['kode_kecamatan'];
    $nama_kecamatan = $_POST['nama_kecamatan'];

    $result = mysqli_query($conn, "UPDATE kecamatan SET kode_kecamatan='$kode_kecamatan',nama_kecamatan='$nama_kecamatan',
geojson_file_name='$geojson_file_name' WHERE id=$id");
    // Redirect to homepage to display updated user in list
    header("Location:?page=kecamatan-show");
}