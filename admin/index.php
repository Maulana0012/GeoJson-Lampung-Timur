<?php
session_start();
if ($_SESSION['pengguna'] == '') {
    header("location:../index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <base href="praktikum2020"> -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- geojson -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <link rel="shortcut icon" href="assets/image/BalanganLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../geojson-project/index-css.css">
    <title> WEBGIS</title>
    <style>
    body {
        margin-bottom: 6em;
    }

    * {
        font-size: 14px;
    }

    footer {
        position: fixed;
        /* height: 100px; */
        bottom: 0;
        width: 100%;
        background: #0d6efd;
        padding: 10px 0;
        color: #fff;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 1.5px;
        text-align: center;
    }
    </style>
</head>

<body>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="../assets/js/leaflet.ajax.js"></script>
    <script src="../assets/js/leaflet-panel-layers/src/leaflet-panel-layers.js"></script>
    <script src="../assets/js/leaflet.ajax.js"></script>
    <script src="../assets/js/leaflet-easyPrint-gh-pages/dist/bundle.js"></script>
    <?php include 'header.php'; ?>

    <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-3 col-sm-12 mb-4">

                <?php include 'nav.php'; ?>
            </div>
            <div class="col-md-9 col-sm-12">
                <?php include '../connection.php'; ?>
                <?php
                // error_reporting(0);
                switch ($_GET['page']) {
                    default:
                    // Pengguna
                    case "user-add";
                        include "../Pengguna/user_add.php";
                        break;
                    case "user-show";
                        include "../Pengguna/user_show.php";
                        break;
                    case "user-edit";
                        include "../Pengguna/user_edit.php";
                        break;
                    case "user-update";
                        include "../Pengguna/user_update.php";
                        break;
                    // Geojson
                    case "index-main";
                        include "../geojson-project/index_main.php";
                        break;
                    // Geojson kecamatan
                    case "kecamatan-add";
                        include "../kecamatan/kecamatan_add.php";
                        break;
                    case "kecamatan-show";
                        include "../kecamatan/kecamatan_show.php";
                        break;
                    case "kecamatan-edit";
                        include "../kecamatan/kecamatan_edit.php";
                        break;
                    case "kecamatan-update";
                        include "../kecamatan/kecamatan_update.php";
                        break;
                    // Geojson Marker
                    case "marker-add";
                        include "../Marker/marker_add.php";
                        break;
                    case "marker-show";
                        include "../Marker/marker_show.php";
                        break;
                    case "marker-edit";
                        include "../Marker/marker_edit.php";
                        break;
                    case "marker-update";
                        include "../Marker/marker_update.php";
                        break;
                }
                ?>
            </div>
        </div>
    </div>
    <footer>
        <div class="container ">
            <span>&copy; <?php echo date('Y'); ?> - WEBGIS</span>
        </div>
    </footer>
</body>

</html>