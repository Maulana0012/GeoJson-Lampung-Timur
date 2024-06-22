<?php
include "../connection.php";
$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM marker WHERE id=$id");
header("Location:../admin/?page=marker-show");
// echo "<meta http-equiv='refresh' content='0; url=../?page=kabupaten-show'>";