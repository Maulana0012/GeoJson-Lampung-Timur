<?php
$servername = "localhost:3307";
$user = "root";
$password = "";
$db = "geojson";

// Create connection
$conn = mysqli_connect($servername, $user, $password, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}