<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM marker WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $kode_kecamatan = $data['kode_kecamatan'];
    $keterangan = $data['keterangan'];
    $lat_post = $data['lat_pos'];
    $lng_post = $data['lng_pos'];

}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="panel-title">Ubah Data Kecamatan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=marker-update" class="form-horizontal">
                    <div class="form-group">
                        <label for="kode_kecamatan" class="col-sm-2 control-label">Kode Kecamatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode_kecamatan"
                                value="<?php echo $kode_kecamatan; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-sm-2 control-label">keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keterangan" value="<?php echo $keterangan; ?>"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lat_pos" class="col-sm-2 control-label">Latitude Position</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" step="0.0000000000000001" name="lat_pos"
                                value="<?php echo $lat_post; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lng_pos" class="col-sm-2 control-label">Longitude Position</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" step="0.0000000000000001" name="lng_pos"
                                value="<?php echo $lng_post; ?>" required>
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