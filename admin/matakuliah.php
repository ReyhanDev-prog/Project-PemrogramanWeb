<?php $page_title = 'Data Mata Kuliah'; include 'header.php';
$result = $conn->query("SELECT mk.*, d.nama as dosen_nama FROM mata_kuliah mk LEFT JOIN dosen d ON mk.dosen_id = d.id");
?>
<div class="card"><div class="card-header"><h3 class="card-title">Daftar Mata Kuliah</h3><a href="matakuliah_tambah.php" class="btn btn-primary float-right">Tambah MK</a></div>
<div class="card-body"><table class="table table-bordered"><thead><tr><th>Kode</th><th>Nama MK</th><th>SKS</th><th>Semester</th><th>Dosen</th><th>Aksi</th></tr></thead><tbody>
<?php while($row = $result->fetch_assoc()): ?>
<tr><td><?= $row['kode_mk'] ?></td><td><?= $row['nama_mk'] ?></td><td><?= $row['sks'] ?></td><td><?= $row['semester_ajaran'] ?></td><td><?= $row['dosen_nama'] ?? '-' ?></td>
<td><a href="matakuliah_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
<a href="proses.php?hapus_matakuliah=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a></td></tr>
<?php endwhile; ?></tbody></table></div></div>
<?php include 'footer.php'; ?>