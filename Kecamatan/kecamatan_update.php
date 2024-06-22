<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $kode_kecamatan = $_POST['kode_kecamatan'];
    $nama_kecamatan = $_POST['nama_kecamatan'];

    // update user data
    $result = mysqli_query($conn, "UPDATE kecamatan SET kode_kecamatan='$kode_kecamatan',nama_kecamatan='$nama_kecamatan' WHERE id=$id");
    // Redirect to homepage to display updated user in list
    header("Location:?page=kecamatan-show");
}