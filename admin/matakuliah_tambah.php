<?php
$page_title = 'Tambah Mata Kuliah';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode   = $_POST['kode_mk'];
    $nama   = $_POST['nama_mk'];
    $sks    = (int)$_POST['sks'];
    $semester = $_POST['semester_ajaran'];
    $dosen_id = $_POST['dosen_id'] ?: 'NULL';

    $conn->query("INSERT INTO mata_kuliah (kode_mk, nama_mk, sks, semester_ajaran, dosen_id)
    VALUES ('$kode', '$nama', $sks, '$semester', $dosen_id)");
    header('Location: matakuliah.php');
    exit;
}

$dosen_list = $conn->query("SELECT id, nama FROM dosen ORDER BY nama");
?>
<div class="card">
<div class="card-header">Tambah Mata Kuliah</div>
<div class="card-body">
<form method="POST">
<div class="form-group">
<label>Kode MK</label>
<input type="text" name="kode_mk" class="form-control" required>
</div>
<div class="form-group">
<label>Nama MK</label>
<input type="text" name="nama_mk" class="form-control" required>
</div>
<div class="form-group">
<label>SKS</label>
<input type="number" name="sks" class="form-control" required>
</div>
<div class="form-group">
<label>Semester</label>
<input type="text" name="semester_ajaran" class="form-control" placeholder="Ganjil/Genap" required>
</div>
<div class="form-group">
<label>Dosen Pengampu</label>
<select name="dosen_id" class="form-control">
<option value="">-- Pilih Dosen (opsional) --</option>
<?php while($d = $dosen_list->fetch_assoc()): ?>
<option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
<?php endwhile; ?>
</select>
</div>
<button type="submit" class="btn btn-success">Simpan</button>
<a href="matakuliah.php" class="btn btn-secondary">Batal</a>
</form>
</div>
</div>
<?php include 'footer.php'; ?>
