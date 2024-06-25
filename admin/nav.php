<ul class="list-group">
    <?php
    if ($_SESSION['pengguna'] == 'administrator') {
        echo '
        <li class="list-group-item"><a href="?page=index-main">Geojson</a></li>
        <li class="list-group-item"><a href="?page=kecamatan-show">Data Kecamatan</a></li>
        <li class="list-group-item"><a href="?page=kecamatan-add">Tambah Data Kecamatan</a></li>
        <li class="list-group-item"><a href="?page=marker-show">Marker</a></li>
        <li class="list-group-item"><a href="?page=marker-add">Tambah Marker</a></li>
        <li class="list-group-item"><a href="?page=user-show">Data Pengguna</a></li>
        <li class="list-group-item"><a href="?page=user-add">Tambah Pengguna</a></li>';
    } else if ($_SESSION['pengguna'] == 'kepala') {
        echo '
        <li class="list-group-item"><a href="?page=kecamatan-show">Geojson</a></li>
        <li class="list-group-item"><a href="?page=marker-show">Marker</a></li>
        <li class="list-group-item"><a href="?page=marker-add">Tambah Marker</a></li>
        <li class="list-group-item"><a href="?page=marker-show">Data Kecamatan</a></li>
        <li class="list-group-item"><a href="?page=marker-add">TambahData Kecamatan</a></li>';
    } else {
        echo '
        <li class="list-group-item"><a href="?page=kabupaten-show">Geojson</a></li>';
    }
    ?>
    <li class="list-group-item"><a href="logout.php ">Logout</a></li>

</ul>