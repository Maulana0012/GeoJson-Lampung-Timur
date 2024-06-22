<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $kode_kecamatan = $_POST['kode_kecamatan'];
    $keterangan = $_POST['keterangan'];
    $lat = $_POST['lat_pos'];
    $lng = $_POST['lng_pos'];


    // update user data
    $result = mysqli_query($conn, "UPDATE marker SET kode_kecamatan='$kode_kecamatan', keterangan='$keterangan', lat_pos='$lat', lng_pos='$lng' WHERE id=$id");
    // Redirect to homepage to display updated user in list
    header("Location:?page=marker-show");
}