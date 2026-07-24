<?php $page_title = 'Edit Dosen'; include 'header.php';
$id = $_GET['id'] ?? 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nidn = $_POST['nidn']; $nama = $_POST['nama']; $username = $_POST['username']; $password = $_POST['password'];
    $conn->query("UPDATE users SET username='$username' WHERE id=(SELECT user_id FROM dosen WHERE id=$id)");
    if (!empty($password)) $conn->query("UPDATE users SET password='".md5($password)."' WHERE id=(SELECT user_id FROM dosen WHERE id=$id)");
    $conn->query("UPDATE dosen SET nidn='$nidn', nama='$nama' WHERE id=$id");
    header('Location: dosen.php'); exit;
}
$data = $conn->query("SELECT d.*, u.username FROM dosen d JOIN users u ON d.user_id = u.id WHERE d.id=$id")->fetch_assoc();
if (!$data) { header('Location: dosen.php'); exit; }
?>
<div class="card"><div class="card-header">Edit Dosen</div><div class="card-body">
<form method="POST">
    <div class="form-group"><label>NIDN</label><input type="text" name="nidn" value="<?= $data['nidn'] ?>" class="form-control" required></div>
    <div class="form-group"><label>Nama</label><input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" required></div>
    <div class="form-group"><label>Username</label><input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" required></div>
    <div class="form-group"><label>Password (kosongkan jika tidak diubah)</label><input type="password" name="password" class="form-control"></div>
    <button type="submit" class="btn btn-success">Update</button> <a href="dosen.php" class="btn btn-secondary">Batal</a>
</form></div></div>
<?php include 'footer.php'; ?>