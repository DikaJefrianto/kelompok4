<?php
require 'koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'read';
switch ($aksi) {
    case 'read':
?>
        <h1>Data User</h1>
        <a href="index.php?page=user&aksi=create" class="btn btn-primary">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $queryMhs = mysqli_query($db, "SELECT * FROM user");
                $no = 1;
                while ($data = mysqli_fetch_array($queryMhs)) {
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $data['nama_lengkap']  ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['level'] ?></td>

                        <td>
                            <a href="index.php?page=user&aksi=update&id=<?= $data['id']  ?>" class="btn btn-warning">Edit</a>
                            <a href="proses_user.php?proses=hapus&id=<?= $data['id']  ?>" onclick="return confirm('apakah Anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php
        break;
    case "create":
    ?>
        <h1>Input Data User</h1>
        <form action="proses_user.php?proses=simpan" method="POST">
            <div class="mb-3">
                <label for="nama_legkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="">Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>
            </div>
            <button type="submit" name="submit" value="simpan" class="btn btn-primary">Submit</button>
        </form>
    <?php
        break;
    case 'update':
    ?>
        <h1>Edit Data user</h1>
        <?php
        $id = $_GET['id'];
        $query = mysqli_query($db, "SELECT * FROM user WHERE id=$id");
        $row = mysqli_fetch_array($query);
        ?>
        <form action="proses_user.php?proses=edit" method="POST">
            <input type="hidden" value="<?= $id ?>" name="id">
            <div class="mb-3">
                <label for="nama_legkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select name="level" id="level" class="form-control">
                    <option value="">Pilih Level</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            <button type="submit" name="update" value="update" class="btn btn-primary">Submit</button>
        </form>
<?php
        break;
}
?>