<?php
$page_title = 'Edit Mata Kuliah';
include 'header.php';

$id = $_GET['id'] ?? 0;
if (!$id) {
    header('Location: matakuliah.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode   = $_POST['kode_mk'];
    $nama   = $_POST['nama_mk'];
    $sks    = (int)$_POST['sks'];
    $semester = $_POST['semester_ajaran'];
    $dosen_id = $_POST['dosen_id'] ?: 'NULL';

    $conn->query("UPDATE mata_kuliah SET
    kode_mk='$kode',
    nama_mk='$nama',
    sks=$sks,
    semester_ajaran='$semester',
    dosen_id=$dosen_id
    WHERE id=$id");
    header('Location: matakuliah.php');
    exit;
}

$data = $conn->query("SELECT * FROM mata_kuliah WHERE id=$id")->fetch_assoc();
if (!$data) {
    header('Location: matakuliah.php');
    exit;
}

$dosen_list = $conn->query("SELECT id, nama FROM dosen ORDER BY nama");
?>
<div class="card">
<div class="card-header">Edit Mata Kuliah</div>
<div class="card-body">
<form method="POST">
<div class="form-group">
<label>Kode MK</label>
<input type="text" name="kode_mk" value="<?= htmlspecialchars($data['kode_mk']) ?>" class="form-control" required>
</div>
<div class="form-group">
<label>Nama MK</label>
<input type="text" name="nama_mk" value="<?= htmlspecialchars($data['nama_mk']) ?>" class="form-control" required>
</div>
<div class="form-group">
<label>SKS</label>
<input type="number" name="sks" value="<?= $data['sks'] ?>" class="form-control" required>
</div>
<div class="form-group">
<label>Semester</label>
<input type="text" name="semester_ajaran" value="<?= htmlspecialchars($data['semester_ajaran']) ?>" class="form-control" required>
</div>
<div class="form-group">
<label>Dosen Pengampu</label>
<select name="dosen_id" class="form-control">
<option value="">-- Pilih Dosen (opsional) --</option>
<?php while($d = $dosen_list->fetch_assoc()): ?>
<option value="<?= $d['id'] ?>" <?= ($d['id'] == $data['dosen_id']) ? 'selected' : '' ?>>
<?= $d['nama'] ?>
</option>
<?php endwhile; ?>
</select>
</div>
<button type="submit" class="btn btn-success">Update</button>
<a href="matakuliah.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
