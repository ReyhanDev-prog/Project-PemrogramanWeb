<?php $page_title = 'Data Mahasiswa'; include 'header.php';
$result = $conn->query("SELECT m.*, u.username FROM mahasiswa m JOIN users u ON m.user_id = u.id");
?>
<div class="card"><div class="card-header"><h3 class="card-title">Daftar Mahasiswa</h3><a href="mahasiswa_tambah.php" class="btn btn-primary float-right">Tambah Mahasiswa</a></div>
<div class="card-body"><table class="table table-bordered"><thead><tr><th>NIM</th><th>Nama</th><th>Prodi</th><th>Username</th><th>Aksi</th></tr></thead><tbody>
<?php while($row = $result->fetch_assoc()): ?>
<tr><td><?= $row['nim'] ?></td><td><?= $row['nama'] ?></td><td><?= $row['program_studi'] ?></td><td><?= $row['username'] ?></td>
<td><a href="mahasiswa_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
<a href="proses.php?hapus_mahasiswa=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</a></td></tr>
<?php endwhile; ?></tbody></table></div></div>
<?php include 'footer.php'; ?>