<?php include "../connection.php"; ?>

<?php
$id = $_GET['id'];
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id=$id");
while ($data = mysqli_fetch_array($result)) {
    $username = $data['pengguna'];
    $password = $data['password'];
    $level = $data['tipe_level'];

}
?>
<div class="card">
    <div class="card-header">
        <strong>Tambah Data User</strong>
    </div>
    <div class="card-body">
        <form action="?page=user-update" method="POST">
            <!-- <?php echo $password ?> -->
            <input type="hidden" name="password_lama1" class="form-control" placeholder="Username" value="<?php echo $password;
            ?>">
            <div class="form-group row">
                <label for="pengguna" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="pengguna" class="form-control" placeholder="Username"
                        value="<?php echo $username; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password_lama2" class="col-sm-3 col-form-label">Password Lama</label>
                <div class="col-sm-9">
                    <input type="password" name="password_lama2" class="form-control" placeholder="Password Lama"
                        required>
                </div>
            </div>
            <div class=" form-group row">
                <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                <div class="col-sm-9">
                    <input type="password" name="password_baru" class="form-control" placeholder="Password Baru"
                        required>
                </div>
            </div>
            <div class="form-group">
                <label for="level" class="control-label">Level</label>
                <select class="form-control" name="level">
                    <option disabled> Pilih </option>
                    <option <?php if ($level == "adminstrator")
                        echo 'selected'; ?> value="administrator">Administrasi
                    </option>
                    <option <?php if ($level == "kepala")
                        echo 'selected'; ?> value="kepala">Kepala</option>
                    <option <?php if ($level == "pengguna")
                        echo 'selected'; ?> value="pengguna">Pengguna</option>
                </select>
            </div>
    </div>
    <div class=" card-footer bg-transparent">
        <input type="hidden" name="id" value=<?php echo $id; ?>>
        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
    </form>
</div>