<?php
$page_title = 'Tambah Mahasiswa';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['program_studi'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Simpan ke users
    $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'mahasiswa')");
    $user_id = $conn->insert_id;

    // Simpan ke mahasiswa (gunakan kolom: nim, nama, program_studi, user_id)
    $conn->query("INSERT INTO mahasiswa (user_id, nim, nama, program_studi) VALUES ($user_id, '$nim', '$nama', '$prodi')");

    header('Location: mahasiswa.php');
    exit;
}
?>
<div class="card">
<div class="card-header">Tambah Mahasiswa</div>
<div class="card-body">
<form method="POST">
<div class="form-group">
<label>NIM</label>
<input type="text" name="nim" class="form-control" required>
</div>
<div class="form-group">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>
<div class="form-group">
<label>Program Studi</label>
<input type="text" name="program_studi" class="form-control" required>
</div>
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control" required>
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>
<button type="submit" class="btn btn-success">Simpan</button>
<a href="mahasiswa.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
