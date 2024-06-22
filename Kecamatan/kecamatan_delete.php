<?php
include "../connection.php";
$id = $_GET['id'];

$delete = $conn->query("SELECT geojson_file_name FROM kecamatan where id = $id");

if ($delete->num_rows > 0) {
    // output data of each row
    while ($row = $delete->fetch_assoc()) {
        unlink('../upload/' . $row['geojson_file_name']);
    }
}

$result = mysqli_query($conn, "DELETE FROM kecamatan WHERE id=$id");
header("Location:../admin/?page=kecamatan-show");
// echo "<meta http-equiv='refresh' content='0; url=../?page=kabupaten-show'>";