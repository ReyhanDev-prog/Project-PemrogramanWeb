<?php $page_title = 'Isi Nilai'; include 'header.php';
$user_id = $_SESSION['user_id'];
$dosen_id = $conn->query("SELECT id FROM dosen WHERE user_id=$user_id")->fetch_assoc()['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_nilai'])) {
    foreach ($_POST['nilai'] as $krs_id => $nilai) {
        $nilai = strtoupper($nilai);
        if ($nilai) $conn->query("UPDATE krs SET nilai='$nilai' WHERE id=$krs_id");
    }
    echo "<div class='alert alert-success'>Nilai berhasil disimpan!</div>";
}
$mk_result = $conn->query("SELECT * FROM mata_kuliah WHERE dosen_id = $dosen_id");
?>
<div class="container-fluid">
<?php while($mk = $mk_result->fetch_assoc()): ?>
<div class="card"><div class="card-header"><h5><?= $mk['kode_mk'] ?> - <?= $mk['nama_mk'] ?></h5></div><div class="card-body">
<form method="POST"><table class="table table-bordered"><thead><tr><th>NIM</th><th>Nama Mahasiswa</th><th>Nilai</th></tr></thead><tbody>
<?php
$krs_result = $conn->query("SELECT krs.id, m.nim, m.nama, krs.nilai FROM krs JOIN mahasiswa m ON krs.mahasiswa_id = m.id WHERE krs.mata_kuliah_id = ".$mk['id']);
if ($krs_result->num_rows == 0) echo "<tr><td colspan='3'>Tidak ada mahasiswa.</td></tr>";
else while($krs = $krs_result->fetch_assoc()):
?>
<tr><td><?= $krs['nim'] ?></td><td><?= $krs['nama'] ?></td>
<td><select name="nilai[<?= $krs['id'] ?>]" class="form-control"><option value="">-- Pilih --</option>
<?php foreach(['A','B+','B','C+','C','D','E'] as $opt) { $sel = ($krs['nilai']==$opt)?'selected':''; echo "<option value='$opt' $sel>$opt</option>"; } ?>
</select></td></tr>
<?php endwhile; ?>
</tbody></table><button type="submit" name="update_nilai" class="btn btn-primary">Simpan Nilai</button></form>
</div></div>
<?php endwhile; ?>
</div>
<?php include 'footer.php'; ?>