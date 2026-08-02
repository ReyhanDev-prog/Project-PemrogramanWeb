<?php
$page_title = 'Edit Mahasiswa';
include 'header.php';

$id = $_GET['id'] ?? 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['program_studi'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update users
    $conn->query("UPDATE users SET username='$username' WHERE id=(SELECT user_id FROM mahasiswa WHERE id=$id)");
    if (!empty($password)) {
        $conn->query("UPDATE users SET password='" . md5($password) . "' WHERE id=(SELECT user_id FROM mahasiswa WHERE id=$id)");
    }

    // Update mahasiswa
    $conn->query("UPDATE mahasiswa SET nim='$nim', nama='$nama', program_studi='$prodi' WHERE id=$id");

    header('Location: mahasiswa.php');
    exit;
}

$data = $conn->query("SELECT m.*, u.username FROM mahasiswa m JOIN users u ON m.user_id = u.id WHERE m.id=$id")->fetch_assoc();
if (!$data) {
    header('Location: mahasiswa.php');
    exit;
}
?>
<div class="card">
<div class="card-header">Edit Mahasiswa</div>
<div class="card-body">
<form method="POST">
<div class="form-group">
<label>NIM</label>
<input type="text" name="nim" value="<?= $data['nim'] ?>" class="form-control" required>
</div>
<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
</div>
<div class="form-group">
<label>Program Studi</label>
<input type="text" name="program_studi" value="<?= $data['program_studi'] ?>" class="form-control" required>
</div>
<div class="form-group">
<label>Username</label>
<input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" required>
</div>
<div class="form-group">
<label>Password (kosongkan jika tidak diubah)</label>
<input type="password" name="password" class="form-control">
</div>
<button type="submit" class="btn btn-success">Update</button>
<a href="mahasiswa.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
