<?php $page_title = 'Tambah mahasiswa'; include 'header.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nidn = $_POST['nidn']; $nama = $_POST['nama']; $username = $_POST['username']; $password = md5($_POST['password']);
    $conn->query("INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'mahasiswa')");
    $user_id = $conn->insert_id;
    $conn->query("INSERT INTO mahasiswa (user_id, nidn, nama) VALUES ($user_id, '$nidn', '$nama')");
    header('Location: mahasiswa.php'); exit;
}
?>
<div class="card"><div class="card-header">Tambah mahasiswa</div><div class="card-body">
<form method="POST">
    <div class="form-group"><label>NIDN</label><input type="text" name="nidn" class="form-control" required></div>
    <div class="form-group"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
    <div class="form-group"><label>Username</label><input type="text" name="username" class="form-control" required></div>
    <div class="form-group"><label>Password</label><input type="password" name="password" class="form-control" required></div>
    <button type="submit" class="btn btn-success">Simpan</button> <a href="mahasiswa.php" class="btn btn-secondary">Batal</a>
</form></div></div>
<?php include 'footer.php'; ?>