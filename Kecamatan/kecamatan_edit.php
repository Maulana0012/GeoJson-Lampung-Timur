<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM kecamatan WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $kode_kecamatan = $data['kode_kecamatan'];
    $nama_kecamatan = $data['nama_kecamatan'];
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="panel-title">Ubah Data Kecamatan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=kecamatan-update" class="form-horizontal">
                    <div class="form-group">
                        <label for="kode_kecamatan" class="col-sm-2 control-label">Kode Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode_kecamatan"
                                value="<?php echo $kode_kecamatan; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_kecamatan" class="col-sm-2 control-label">Nama Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_kecamatan"
                                value="<?php echo $nama_kecamatan; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                            <input type="submit" name="update" class="btn btn-primary" value="Update">
                            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>